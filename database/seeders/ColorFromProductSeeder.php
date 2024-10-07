<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ColorFromProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            $colors = Color::query()->inRandomOrder()->limit(rand(1, 5))->pluck('id');
            $product->productColors()->attach($colors);
        }
    }
}
