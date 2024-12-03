<?php

namespace Database\Factories;

use App\Models\Sale;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleDetail>
 */
class SaleDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $qty = $this->faker->numberBetween(1, 10); // Random quantity between 1 and 10
        $unitPrice = $this->faker->randomFloat(2, 10, 200); // Random unit price between 10 and 200
        $totalPrice = $qty * $unitPrice; // Calculate total price

        return [
            'sale_id' => Sale::factory(), // Create or use a Sale
            'product_id' => Product::factory(), // Create or use a Product
            'qty' => $qty,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
        ];
    }
}
