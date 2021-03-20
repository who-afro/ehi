<?php

namespace Database\Factories;

use App\Models\PublicHealthFunction;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicHealthFunctionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PublicHealthFunction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'uuid' => $this->faker->uuid,
        ];
    }
}
