<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;
use Illuminate\Support\Carbon;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            Inventory::create([
                'product_id' => $i,
                'quantity_in_stock' => rand(10, 100),
                'quantity_sold' => rand(0, 50),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
                'updated_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }
    }
}
