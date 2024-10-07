<?php

namespace Database\Seeders\Traits;

use Arr;

trait TranslateArrayTraits
{
    /**
     * @param  array  $array
     * @param  string  $title
     * @param  string  $description
     * @return array
     *
     * @throws \ErrorException
     */
    public function translate(array $array, string $title = 'title', string $description = 'description'): array
    {
        $data = [];

        foreach ($array as $comment) {
            $arrays = [
                'title:ru' => \TranslateCustom::getTranslateText($comment[$title], 'ru'),
                'title:uk' => \TranslateCustom::getTranslateText($comment[$title], 'uk'),

                'description:ru' => \TranslateCustom::getTranslateText($comment[$description], 'ru'),
                'description:uk' => \TranslateCustom::getTranslateText($comment[$description], 'uk'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        return $data;
    }
}
