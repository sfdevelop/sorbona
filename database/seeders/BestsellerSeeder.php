<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class BestsellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->limit(15)->inRandomOrder()->get()->each(function (Product $product) {
            $product->update(['is_bestseller' => true]);
        });
    }
}
