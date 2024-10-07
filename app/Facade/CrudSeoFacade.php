<?php

namespace App\Facade;

use App\Services\SEOCrud\CrudSeoServiceInterface;
use Illuminate\Support\Facades\Facade;

class CrudSeoFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CrudSeoServiceInterface::class;
    }
}
