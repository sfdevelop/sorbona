<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'category';

    private static int $with = 100;

    private static int $height = 100;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(25)->create();

        $this->uploadImageToSeed(Category::all());
    }
}
