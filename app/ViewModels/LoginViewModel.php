<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Product\ProductRepositoryInterface;

class LoginViewModel extends BaseViewModel
{
    //    use CustomSeoTrait;

    public function __construct(

    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

}
