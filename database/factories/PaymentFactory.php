<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sale_id' => Sale::factory(), // Create or use an existing Sale
            'amount_paid' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'bank_transfer', 'mobile_payment']), // Random payment method
        ];
    }
}
