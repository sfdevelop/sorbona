<?php

namespace App\Facade;

use App\Services\Translate\TranslateServiceInterface;
use Illuminate\Support\Facades\Facade;

class TranslateFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return TranslateServiceInterface::class;
    }
}
