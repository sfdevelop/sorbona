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

        $paragraphs = fake()->paragraphs(rand($min, $max));
        $post = '';

        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        return $post;
    }
}
