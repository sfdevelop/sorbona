<?php

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

final class FakerImageProvider extends Base
{
    public function loremFlickr(string $dir = '', int $width = 500, int $height = 500): string
    {
        $name = $dir.'/'.\Str::random(6).'.jpg';

        Storage::disk('public')->put(
            $name,
            file_get_contents("https://loremflickr.com/$width/$height")
        );

        return "app/public/$name";
    }
}
