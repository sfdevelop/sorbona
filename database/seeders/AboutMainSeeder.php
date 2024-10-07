<?php

namespace Database\Seeders;

use App\Models\Page;
use Arr;
use Database\Seeders\Traits\SeedUploadImageTrait;
use Illuminate\Database\Seeder;

class AboutMainSeeder extends Seeder
{
    use SeedUploadImageTrait;

    private static string $collectionName = 'aboutMain';

    private static int $with = 625;

    private static int $height = 770;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'Про нас',
                'description' => '<p>Lorem ipsum dolor sit amet consectetur. Nunc tristique lacinia suscipit semper nascetur. Dictum nunc nam integer donec. Diam ultrices pellentesque rhoncus diam. Lectus vel magna egestas sodales turpis eget eget. Diam ultrices turpis dignissim ullamcorper aliquet ut commodo. Facilisi cras amet eleifend bibendum nisl elementum elementum morbi venenatis. In at aliquet fusce vitae turpis sit ac in. Quis potenti molestie eget tellus ultricies tincidunt mi. Nunc habitant facilisi lectus velit accumsan tellus in tincidunt neque. Gravida tempor magna morbi eu risus. Id a nec venenatis mattis dictum arcu diam faucibus bibendum.</p> 
<p>Aliquet sed fames ornare cras fames ac risus aenean ridiculus. Gravida lacinia ut sed eget faucibus quisque. Sit cras id fermentum semper ultrices tempus laoreet. Et sed phasellus odio in purus mattis in est. Eleifend ante tortor iaculis fermentum feugiat. Imperdiet ornare tortor duis massa. Rhoncus facilisis lobortis cursus neque risus sit. At augue turpis ut sollicitudin ullamcorper dignissim consequat. Aliquet fames arcu accumsan praesent tellus imperdiet. Felis velit eu rhoncus tincidunt massa. Adipiscing </p>',
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
            Page::query()->create($datum);
        }

        $this->uploadOneImageToSeed(Page::query()->find(1));
    }
}
