<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('first_last_name');
            $table->string('second_last_name');
            $table->integer('age');

            $table->integer('id_interest')->unsigned();//foreign key
            $table->integer('id_marital_status')->unsigned();//foreign key
         
            
            $table->string('email')->unique();
            $table->string('password');
          

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_gender')->references('id')->on('gender');
            $table->foreign('id_interest')->references('id')->on('interest');
            $table->foreign('id_marital_status')->references('id')->on('marital_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

