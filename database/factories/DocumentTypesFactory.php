<?php

namespace Database\Factories\Backend;

use App\Models\Backend\DocumentTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DocumentTypes::class;

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
