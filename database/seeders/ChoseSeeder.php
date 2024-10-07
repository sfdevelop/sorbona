<?php

namespace Database\Seeders;

use App\Models\Chose;
use Arr;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class ChoseSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'chose';

    private static int $with = 50;

    private static int $height = 50;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'Easy to order',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Eu nisi vitae',
            ],
            [
                'title' => 'Paid',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Eu nisi vitae',
            ],
            [
                'title' => 'Quickly received',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Eu nisi vitae',
            ],
            [
                'title' => 'You are happy',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Eu nisi vitae',
            ],
            [
                'title' => 'You use',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Eu nisi vitae',
            ],

        ];

        $data = [];

        foreach ($datas as $items) {
            $arrays = [
                'title:en' => \TranslateCustom::getTranslateText($items['title'], 'en', 'en'),
                'title:uk' => \TranslateCustom::getTranslateText($items['title'], 'uk', 'en'),

                'description:en' => \TranslateCustom::getTranslateText($items['description'], 'en'),
                'description:uk' => \TranslateCustom::getTranslateText($items['description'], 'uk'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        foreach ($data as $datum) {
            Chose::query()->create($datum);
        }

        $this->uploadImageToSeed(Chose::all());
    }
}
