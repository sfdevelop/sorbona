<?php

namespace App\Facade;

use App\Repository\Currency\CurrencyRepositoryInterface;
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
