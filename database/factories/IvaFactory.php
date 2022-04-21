<?php

namespace Database\Factories\Backend;

use App\Models\Backend\Iva;
use Illuminate\Database\Eloquent\Factories\Factory;

class IvaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Iva::class;

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
        'end_date' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
