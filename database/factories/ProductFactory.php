<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(), // Create a category and use its ID
            'supplier_id' => Supplier::factory(), // Create a supplier and use its ID
            'name' => $this->faker->word, // Random product name
            'description' => $this->faker->sentence, // Random description
            'price' => $this->faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
            'cost_price' => $this->faker->randomFloat(2, 5, 500), // Random cost price
            'qty' => $this->faker->numberBetween(1, 100), // Random quantity
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
        ];
    }
}
