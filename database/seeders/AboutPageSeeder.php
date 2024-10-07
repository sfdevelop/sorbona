<?php

namespace Database\Seeders;

use App\Models\Page;
use Arr;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'aboutPagePhoto';

    private static int $with = 625;

    private static int $height = 770;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'About Us',
                'titleSectionAboutUs' => 'Ласкаво просимо до нашого магазину спорядження для фехтувальників!',
                'description' => 'Ми — команда професійних фехтувальників гіків з України, які знають все про потреби та вимоги HEMA спорту. Наш магазин створено для фехтувальників і фехтувальниками, щоб забезпечити вас найкращим спорядженням, яке відповідає найвищим стандартам якості та безпеки.',
                'titleDownAboutUs' => 'З найкращими побажаннями,команда вашого магазину спорядження для фехтувальників Bureviy.',
                'descriptionRememberAboutUs' => 'Справжнє спорядження від фехтувальників для фехтувальників — це запорука вашого успіху на шляху до перемог!',
                'textFeedBackAboutUs' => 'Якщо у вас є питання або вам потрібна допомога у виборі спорядження, наша команда завжди готова допомогти. Ми раді бути частиною вашого фехтувального шляху і допомогти вам досягти нових вершин у цьому чудовому виді спорту.',
            ],
        ];

        $data = [];

        foreach ($datas as $items) {
            $arrays = [
                'title:en' => \TranslateCustom::getTranslateText($items['title'], 'en'),
                'title:uk' => \TranslateCustom::getTranslateText($items['title'], 'uk'),

                'description:en' => \TranslateCustom::getTranslateText($items['description'], 'en'),
                'description:uk' => \TranslateCustom::getTranslateText($items['description'], 'uk'),

                'titleSectionAboutUs:en' => \TranslateCustom::getTranslateText($items['titleSectionAboutUs'], 'en'),
                'titleSectionAboutUs:uk' => \TranslateCustom::getTranslateText($items['titleSectionAboutUs'], 'uk'),

                'titleDownAboutUs:en' => \TranslateCustom::getTranslateText($items['titleDownAboutUs'], 'en'),
                'titleDownAboutUs:uk' => \TranslateCustom::getTranslateText($items['titleDownAboutUs'], 'uk'),

                'descriptionRememberAboutUs:en' => \TranslateCustom::getTranslateText($items['descriptionRememberAboutUs'], 'en'),
                'descriptionRememberAboutUs:uk' => \TranslateCustom::getTranslateText($items['descriptionRememberAboutUs'], 'uk'),

                'textFeedBackAboutUs:en' => \TranslateCustom::getTranslateText($items['textFeedBackAboutUs'], 'en'),
                'textFeedBackAboutUs:uk' => \TranslateCustom::getTranslateText($items['textFeedBackAboutUs'], 'uk'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        foreach ($data as $datum) {
            Page::query()->create($datum);
        }

        $this->uploadOneImageToSeed(Page::query()->find(2));
    }
}
