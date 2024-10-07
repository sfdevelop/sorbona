<?php

namespace Database\Seeders\Traits;

use Arr;

trait TranslateTitleTraits
{
    /**
     * @param  array  $array
     * @param  string  $title
     * @return array
     *
     * @throws \ErrorException
     */
    public function translate(array $array, string $title = 'title'): array
    {
        $data = [];

        foreach ($array as $comment) {
            $arrays = [
                'title:ru' => \TranslateCustom::getTranslateText($comment[$title], 'ru'),
                'title:uk' => \TranslateCustom::getTranslateText($comment[$title], 'uk'),
            ];

            $data = Arr::prepend($data, $arrays);
        }

        return $data;
    }
}
