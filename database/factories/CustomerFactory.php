<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name, // Random customer name
            'phone' => $this->faker->phoneNumber, // Random phone number
            'email' => $this->faker->unique()->safeEmail, // Random unique email, nullable
            'address' => $this->faker->optional()->address, // Random address, nullable
        ];
    }
}
