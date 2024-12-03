<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalAmount = $this->faker->randomFloat(2, 50, 1000); // Total sale amount between 50 and 1000
        $amountPaid = $this->faker->randomFloat(2, $totalAmount, $totalAmount + 500); // Paid amount >= totalAmount
        $changeDue = $amountPaid - $totalAmount; // Calculate change due to customer

        return [
            'user_id' => User::factory(), // Create or use a User
            'customer_id' => Customer::factory(), // Create or use a Customer
            'total_amount' => $totalAmount,
            'amount_paid' => $amountPaid,
            'change_due' => $changeDue,
        ];
    }
}
