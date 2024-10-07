<?php

namespace Database\Seeders;

use App\Models\Slider;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'slider';

    private static int $with = 1440;

    private static int $height = 566;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = Slider::factory(2)->create();

        $this->uploadOneImageToSeedOnlineWithoutImg($items, self::$collectionName);
    }
}
