<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Slider\SliderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class HomepageViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(

    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }
}
