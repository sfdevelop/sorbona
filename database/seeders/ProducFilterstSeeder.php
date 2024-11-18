<?php

namespace Database\Seeders;

use App\Models\FilterValue;
use App\Models\Product;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class ProducFilterstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$products = Product::all();

        foreach ($products as $product) {
            $product->filterValues()->attach(FilterValue::query()->inRandomOrder()->take(rand(3, 7))->pluck('id')->toArray());
        }
    }
}
