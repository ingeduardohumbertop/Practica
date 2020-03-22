<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bd = \DB::table('gender')->get();
        if($bd){
            \DB::table('gender')->insert(
                [
                    ['name' => 'Masculino',],
                    ['level' => 'Femenino',],
                ]
            );
        }
    }
}
