<?php

namespace App\Facade;

use App\Payment\LiqPayPaymentInterface;
use Illuminate\Support\Facades\Facade;

class LiqPayFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return LiqPayPaymentInterface::class;
    }
}
