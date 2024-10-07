<?php

namespace Database\Seeders;

use App\Models\WhyChoose;
use Arr;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class WhyChooseSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'whyChoose';

    private static int $with = 50;

    private static int $height = 50;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'Довіра фехтувальників',
                'description' => '<p>Нас обирають професіонали та аматори по всьому світу за наші якість та надійність.</p>',
            ],
            [
                'title' => 'Конкурентні ціни',
                'description' => '<p>Ми пропонуємо оптимальне співвідношення ціни та якості, щоб кожен міг дозволити собі найкраще спорядження. Ми впевнені, що зможем знайти те, що саме потрібно, для кожного фехтувальника.</p>',
            ],
            [
                'title' => 'Швидка доставка',
                'description' => '<p>Ваше замовлення буде оброблено максимально швидко, щоб ви могли якомога швидше насолоджуватися тренуваннями та змаганнями</p>',
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
            WhyChoose::query()->create($datum);
        }

        $this->uploadImageToSeed(WhyChoose::all());
    }
}
