<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->jobTitle,
            'description' =>fake()->sentence,
            'salary' => fake()->numberBetween(500, 2000),
            'admin_created_id' => 0,
            'admin_updated_id' => 0,
        ];
    }
}
