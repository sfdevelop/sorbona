<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class SubcategoryThreeTreasSeeder extends Seeder
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
//        Category::all()->random(rand(5,7))->each(function ($category) {
//            $subcategory = Category::factory(rand(5,8))
//                ->create(['category_id' => $category->id]);
//
//            $this->uploadImageToSeed($subcategory);
//        });


        $nullCategory = Category::query()->whereNull('category_id')->get();

        $parentCategories =
            Category::query()->whereNotNull('category_id')->get();

        $nullCategory->random(rand(3, 5))->each(function ($category) use (
            $parentCategories,
        ) {
                $category->category_id = $parentCategories->random()->id;
                $category->save();
        });

//        $this->uploadImageToSeed($subcategory);
    }
}
