<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company, // Random company name
            'contact_person' => $this->faker->name, // Random contact person's name
            'phone' => $this->faker->phoneNumber, // Random phone number
            'email' => $this->faker->unique()->safeEmail, // Random unique email
            'address' => $this->faker->address, // Random address
        ];
    }
}
