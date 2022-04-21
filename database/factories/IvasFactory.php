<?php

namespace Database\Factories\Backend;

use App\Models\Backend\Ivas;
use Illuminate\Database\Eloquent\Factories\Factory;

class IvasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ivas::class;

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
