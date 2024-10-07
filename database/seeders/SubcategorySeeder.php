<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'category';

    private static int $with = 500;

    private static int $height = 650;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::all()->random(rand(4,6))->each(function ($category) {
            $subcategory = Category::factory(rand(4,6))
                ->create(['category_id' => $category->id]);

            $this->uploadImageToSeed($subcategory);
        });
    }
}
