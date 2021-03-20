<?php

namespace Database\Factories;

use App\Models\AgeCohort;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgeCohortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AgeCohort::class;

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
            'min_age' => $this->faker->numberBetween(-10000, 10000),
            'max_age' => $this->faker->numberBetween(-10000, 10000),
            'uuid' => $this->faker->uuid,
        ];
    }
}
