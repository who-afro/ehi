<?php

namespace Database\Factories;

use App\Models\InterventionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InterventionCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InterventionCategory::class;

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
