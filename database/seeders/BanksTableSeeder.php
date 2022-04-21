<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Bank;
use App\Models\Backend\TypeAccount;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::factory(3);
    }
}
