<?php

namespace App\Facade;

use App\Repository\Size\SizeRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class SizeFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return SizeRepositoryInterface::class;
    }
}
