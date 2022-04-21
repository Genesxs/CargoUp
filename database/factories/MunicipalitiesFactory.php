<?php

namespace Database\Factories\Backend;

use App\Models\Backend\Municipalities;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipalitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Municipalities::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'code' => $this->faker->word,
        'complete_code' => $this->faker->word,
        'department_id' => $this->faker->randomDigitNotNull
        ];
    }
}
