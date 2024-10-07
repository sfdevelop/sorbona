<?php

namespace Database\Seeders;

use App\Models\Color;
use Arr;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $title = fake()->colorName;

            $arrays = [
                'title:en' => \TranslateCustom::getTranslateText($title, 'en', 'en'),
                'title:uk' => \TranslateCustom::getTranslateText($title, 'uk', 'en'),
                'title:lt' => \TranslateCustom::getTranslateText($title, 'uk', 'lt'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        foreach ($data as $datum) {
            Color::query()->create($datum);
        }
    }
}
