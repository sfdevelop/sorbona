<?php

namespace App\Facade;

use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Facade;

class AdminUserFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return UserRepositoryInterface::class;
    }
}
