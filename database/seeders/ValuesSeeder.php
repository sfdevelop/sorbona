<?php

namespace Database\Seeders;

use App\Models\Values;
use Arr;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class ValuesSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'values';

    private static int $with = 50;

    private static int $height = 50;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'Якість',
                'description' => 'Ми пропонуємо тільки те спорядження, яке ми самі використовуємо на змаганнях та тренуваннях.',
            ],
            [
                'title' => 'Безпека',
                'description' => 'Ваш захист та зручність— наші пріоритети. Усі наші товари пройшли ретельну перевірку і відповідають міжнародним стандартам',
            ],
            [
                'title' => 'Досвід',
                'description' => 'Кожен з наших співробітників має багаторічний досвід у фехтуванні і готовий надати вам професійні консультації.',
            ],
            [
                'title' => 'Пристрасть',
                'description' => 'Ми живемо фехтуванням і прагнемо поділитися цією пристрастю з вами через наші товари та обслуговування.',
            ],
        ];

        $data = [];

        foreach ($datas as $items) {
            $arrays = [
                'title:en' => \TranslateCustom::getTranslateText($items['title'], 'en'),
                'title:uk' => \TranslateCustom::getTranslateText($items['title'], 'uk'),

                'description:en' => \TranslateCustom::getTranslateText($items['description'], 'en'),
                'description:uk' => \TranslateCustom::getTranslateText($items['description'], 'uk'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        foreach ($data as $datum) {
            Values::query()->create($datum);
        }

        $this->uploadImageToSeed(Values::all());
    }
}
