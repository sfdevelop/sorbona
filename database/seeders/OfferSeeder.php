<?php

namespace Database\Seeders;

use App\Models\Offer;
use Arr;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'offer';

    private static int $with = 50;

    private static int $height = 50;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'Широкий асортимент',
                'description' => 'Від спеціалізованих рюкзаків для транспортування спорядження одягу та аксесуарів — у нас ви знайдете все необхідне для фехтування.',
            ],
            [
                'title' => 'Індивідуальний підхід',
                'description' => 'Ми знаємо, що кожен фехтувальник унікальний, тому пропонуємо персоналізовані рішення, щоб ви могли досягти найкращих результатів.',
            ],
            [
                'title' => 'Підтримка спільноти',
                'description' => 'Ми активно підтримуємо фехтувальну спільноту, організовуємо майстер-класи та змагання, щоб сприяти розвитку спорту.',
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
            Offer::query()->create($datum);
        }

        $this->uploadImageToSeed(Offer::all());
    }
}
