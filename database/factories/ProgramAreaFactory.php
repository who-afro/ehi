<?php

namespace Database\Factories;

use App\Models\ProgramGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProgramGroup::class;

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
