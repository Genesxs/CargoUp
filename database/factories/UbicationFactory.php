<?php

namespace Database\Factories;

use App\Models\Frontend\Ubication;
use Illuminate\Database\Eloquent\Factories\Factory;

class UbicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ubication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
