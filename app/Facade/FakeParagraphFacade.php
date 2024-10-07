<?php

namespace App\Facade;

use App\Faker\FakerParagraphProvider;
use Illuminate\Support\Facades\Facade;

class FakeParagraphFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return FakerParagraphProvider::class;
    }
}
