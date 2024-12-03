<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Inventory;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed categories
        Category::factory(10)->create(); // Create 10 categories

        // Seed suppliers
        Supplier::factory(5)->create(); // Create 5 suppliers

        // Seed products
        Product::factory(20)->create(); // Create 20 products

        // Seed customers
        Customer::factory(15)->create(); // Create 15 customers

        // Seed sales
        Sale::factory(10)
            ->has(SaleDetail::factory(3), 'saleDetails') // Each sale has 3 sale details
            ->create();

        // Seed inventory changes
        Inventory::factory(10)->create(); // Create 10 inventory records

        // Seed payments
        Payment::factory(10)->create(); // Create 10 payments

    }
}
