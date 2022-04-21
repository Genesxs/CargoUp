<?php

namespace Database\Factories\Backend;

use App\Models\Backend\TypeAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeAccount::class;

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
