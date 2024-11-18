<?php

namespace App\Facade;

use App\Repository\Manufacture\ManufactureRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class ManufacturerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ManufactureRepositoryInterface::class;
    }
}
