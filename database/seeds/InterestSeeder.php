<?php

use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         $bd = \DB::table('interest')->get();
         if($bd){
             \DB::table('interest')->insert(
                 [
                     ['level' => 'Preparatoria',],
                     ['level' => 'Licenciatura',],
                     ['level' => 'Posgrado',],
       
                 ]
             );
         }
    }
}
