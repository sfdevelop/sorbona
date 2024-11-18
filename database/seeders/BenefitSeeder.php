<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'benefit';

    private static int $with = 60;

    private static int $height = 60;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title:uk' => 'Известность',
                'title:ru' => 'Известность',
            ],
            [
                'title:uk' => 'Ассортимент',
                'title:ru' => 'Ассортимент',
            ],
            [
                'title:uk' => 'Проверенные производители',
                'title:ru' => 'Проверенные производители',
            ],
            [
                'title:uk' => 'Удобство и стоимость',
                'title:ru' => 'Удобство и стоимость',
            ],
        ];

        foreach ($items as $item) {
            Benefit::query()->create($item);
        }
        $this->uploadImageToSeed(Benefit::all());
    }
}
