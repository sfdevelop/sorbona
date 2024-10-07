<?php

namespace App\Facade;

use App\Repository\Color\ColorRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class ColorFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ColorRepositoryInterface::class;
    }
}
