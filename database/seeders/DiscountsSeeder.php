<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use Illuminate\Support\Carbon;

class DiscountsSeeder extends Seeder
{
    public function run(): void
    {
        $discountTypes = ['Percentage', 'Fixed Amount', 'Order Value Based'];

        for ($i = 1; $i <= 20; $i++) {
            $type = $discountTypes[array_rand($discountTypes)];

            // Xác định giá trị giảm giá dựa trên loại
            $discountValue = match ($type) {
                'Percentage' => rand(5, 50),
                'Fixed Amount' => rand(50000, 500000),
                'Order Value Based' => rand(100000, 1000000),
            };

            Discount::create([
                'discount_type' => $type,
                'discount_value' => $discountValue,
                'start_date' => Carbon::now()->subDays(rand(0, 10)),
                'end_date' => Carbon::now()->addDays(rand(5, 30)),
                'created_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
