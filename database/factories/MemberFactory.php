<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'age' => $this->faker->numberBetween(18, 65),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'professional_summary' => $this->faker->paragraph,
        ];
    }
}
