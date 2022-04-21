<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_accounts')->insert([
            'name' => 'Ahorro'
        ]);

        DB::table('type_accounts')->insert([
            'name' => 'Corriente'
        ]);
    }
}
