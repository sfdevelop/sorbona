<?php

namespace App\Facade;

use App\Repository\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CategoryRepositoryInterface::class;
    }
}
