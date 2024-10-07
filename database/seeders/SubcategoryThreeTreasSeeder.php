<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class SubcategoryThreeTreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nullCategory = Category::query()->whereNull('category_id')->get();

        $parentCategories =
            Category::query()->whereNotNull('category_id')->get();

        $nullCategory->random(rand(3, 5))->each(function ($category) use (
            $parentCategories,
        ) {
            $category->category_id = $parentCategories->random()->id;
            $category->save();
        });
    }
}
