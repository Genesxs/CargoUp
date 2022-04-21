<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Quota;

class QuotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=12; $i <= 84; $i+=12) { 
            Quota::create([
                'quota_number' => $i 
            ]);
        }


        
    }
}
