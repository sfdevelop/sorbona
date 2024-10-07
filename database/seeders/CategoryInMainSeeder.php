<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryInMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->inRandomOrder()->take(15)->get()->each(function (Category $category) {
            $category->update(['in_main' => true]);
        });
    }
}
