<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Seeders\Traits\SeedUploadImageTrait;
use DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'product';

    private static int $with = 1060;

    private static int $height = 1000;

    /**
     * Run the database seeds.
     *
     * @throws \Throwable
     */
    public function run(): void
    {
        DB::transaction(function () {
            $items = Product::factory(100)->create();
        });

        //        $this->uploadImageToSeed($items);
    }
}
