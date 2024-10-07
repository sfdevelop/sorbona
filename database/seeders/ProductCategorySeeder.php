<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $categories = Category::query()
            ->doesntHave('childrenCategories')
            ->get()
            ->pluck('id')->toArray();

        foreach ($products as $product) {
            $assignedCategories = array_rand(array_flip($categories),
                rand(1, 4));
            $product->categories()->sync($assignedCategories);
        }
    }
}
