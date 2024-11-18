<?php

namespace App\Faker;

use Faker\Provider\Base;

final class FakerParagraphProvider extends Base
{
    public function countParagraph(int $min = 8, $max = null): string
    {
        if (is_null($max)) {
            $max = ($min !== 8) ? 1 : 30;
        }
        $faker = \Faker\Factory::create('ru_RU');

        // Generate a block of text
        $text = $faker->realText(1200, 4);

        // Split the text into paragraphs
        $paragraphs = explode("\n", wordwrap($text, 300, "\n"));

        // Concatenate paragraphs into a single string with HTML paragraph tags
        $post = '';
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        return $post;
    }
}
