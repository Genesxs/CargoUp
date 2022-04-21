<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\TypeVehicle;
use App\Models\Backend\Quota;

class TypeVehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TypeVehicle::factory(3)->create()->each(function(TypeVehicle $typeVehicle){
        //     Quota::factory(3)->create();
        // });

        TypeVehicle::factory(3)->create([
            'url_photo' => 'public/img/vehicles/vehicle.png',
            'price' => 20000000
        ]);
    }
}
