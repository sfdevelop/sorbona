<?php

namespace App\Facade;

use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Currency\CurrencyRepositoryInterface;
use App\Repository\Manufacture\ManufactureRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CurrencyFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CurrencyRepositoryInterface::class;
    }
}
