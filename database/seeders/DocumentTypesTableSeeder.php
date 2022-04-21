<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'name' => 'Cedula'
        ]);

        DB::table('document_types')->insert([
            'name' => 'Cedula extranjería'
        ]);

        DB::table('document_types')->insert([
            'name' => 'Documento de identidad'
        ]);
    }
}
