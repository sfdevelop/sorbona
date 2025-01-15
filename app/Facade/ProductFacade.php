<?php

namespace App\Facade;

use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ProductRepositoryInterface::class;
    }
}
