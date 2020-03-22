<?php

use Illuminate\Database\Seeder;

class MaritialStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bd = \DB::table('marital_status')->get();
        if($bd){
            \DB::table('marital_status')->insert(
                [
                    ['name' => 'soltero',],
                    ['name' => 'casado',],
                    ['name' => 'viudo',],
                    ['name' => 'apartado',],
                    ['name' => 'divorciado',],
                ]
            );
        }
    }
}
