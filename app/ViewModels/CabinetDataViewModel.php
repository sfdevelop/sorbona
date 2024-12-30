<?php

namespace App\ViewModels;

use App\Services\User\CryptUnCryptData;

class CabinetDataViewModel extends BaseViewModel
{
    public function __construct(

    ) {}

    public function currentPassword()
    {
        return app()
            ->make(CryptUnCryptData::class)
            ->decryptData(\Auth::user()->crypt);
    }
}
