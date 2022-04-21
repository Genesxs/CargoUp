<?php

namespace Database\Factories\Backend;

use App\Models\Backend\Discounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'percentage' => $this->faker->word,
        'start_date' => $this->faker->word,
        'end_date' => $this->faker->word
        ];
    }
}
