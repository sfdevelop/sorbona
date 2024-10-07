<?php

namespace Database\Seeders\Traits;

use Arr;

trait TranslatePageArrayTraits
{
    /**
     * @param  array  $array
     * @param  string  $title
     * @param  string  $description
     * @param  string  $text
     * @return array
     *
     * @throws \ErrorException
     */
    public function translate(array $array, string $title = 'title', string $description = 'description', string $text = 'text'): array
    {
        $data = [];

        foreach ($array as $comment) {
            $arrays = [
                'title:ru' => \TranslateCustom::getTranslateText($comment[$title], 'ru'),
                'title:uk' => \TranslateCustom::getTranslateText($comment[$title], 'uk'),

                'description:ru' => \TranslateCustom::getTranslateText($comment[$description], 'ru'),
                'description:uk' => \TranslateCustom::getTranslateText($comment[$description], 'uk'),

                'text:ru' => \TranslateCustom::getTranslateText($comment[$text], 'ru'),
                'text:uk' => \TranslateCustom::getTranslateText($comment[$text], 'uk'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        return $data;
    }
}
