<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $avatars = [
            'avatar.png',
            'avatar1.png',
            'avatar2.png',
            'avatar3.png',
            'avatar4.png',
            'avatar5.png',
        ];

        return [
            'full_name' => fake()->name(),
            'employment_date' => fake()->date('Y-m-d'),
            'phone' => fake()->phoneNumber(),
            'photo' => $avatars[rand(0, count($avatars) - 1)],
            'admin_created_id' => 0,
            'admin_updated_id' => 0,
            'position_id' => 1
        ];
    }
}
