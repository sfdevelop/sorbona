<?php

namespace App\Facade;

use App\Services\PaymentOrder\PaymentOrderInterface;
use Illuminate\Support\Facades\Facade;

class PaymentFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return PaymentOrderInterface::class;
    }
}
