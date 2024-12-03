<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // Create or use an existing Product
            'user_id' => User::factory(), // Create or use an existing User
            'qty_change' => $this->faker->numberBetween(-10, 50), // Random quantity added or removed
            'reason' => $this->faker->optional()->sentence(), // Random reason, sometimes null
        ];
    }
}
