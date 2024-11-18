<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'manufacturer';

    private static int $with = 150;

    private static int $height = 44;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manufacturer::factory(10)->create();

        $this->uploadImageToSeed(Manufacturer::all());
    }
}
