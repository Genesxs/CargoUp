<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubications')->insert([
            'name' => 'Calle'
        ]);

        DB::table('ubications')->insert([
            'name' => 'Carrera'
        ]);

        DB::table('ubications')->insert([
            'name' => 'Transversal'
        ]);

        DB::table('ubications')->insert([
            'name' => 'Diagonal'
        ]);

        DB::table('ubications')->insert([
            'name' => 'Avenida'
        ]);

        DB::table('ubications')->insert([
            'name' => 'Autopista'
        ]);
    }
}
