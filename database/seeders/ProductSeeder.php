<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'product';

    private static int $with = 800;

    private static int $height = 600;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = Product::factory(100)->create();

        $this->uploadImageToSeed($items);
    }
}