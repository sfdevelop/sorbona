<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeFromProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            $currentSizes = $product->sizes;

            if (! is_array($currentSizes)) {
                $currentSizes = [];
            }

            for ($i = 0; $i < rand(0, 7); $i++) {
                $currentSizes[Size::inRandomOrder()->value('id')] = rand(50, 500);

                $product->sizes = $currentSizes;

                $product->save();
            }
        }
    }
}
