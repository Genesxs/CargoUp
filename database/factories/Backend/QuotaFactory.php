<?php

namespace Database\Factories\Backend;

use App\Models\Backend\Quota;
use App\Models\Backend\TypeVehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'months_number' => $this->faker->randomDigitNotNull,
            'price' => $this->faker->randomElement(['2', '15', '34', '24']),
            'type_vehicle_id' => TypeVehicle::pluck('id')->random(),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
