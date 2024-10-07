<?php

namespace Database\Seeders;

use App\Models\Size;
use Arr;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $title = rand(1, 100);

            $arrays = [
                'title:en' => \TranslateCustom::getTranslateText($title, 'en', 'en'),
                'title:uk' => \TranslateCustom::getTranslateText($title, 'uk', 'en'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        foreach ($data as $datum) {
            Size::query()->create($datum);
        }
    }
}
