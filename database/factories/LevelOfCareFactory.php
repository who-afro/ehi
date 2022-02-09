<?php

namespace Database\Factories;

use App\Models\LevelOfCare;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelOfCareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'uuid' => $this->faker->uuid(),
        ];
    }
}
