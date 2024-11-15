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

    public function mainPageCategories()
    {
       return app()
           ->make(CategoryRepositoryInterface::class)
           ->getCategoriesInMainPage();
    }

    public function mainPageNewProducts()
    {
        return app()
            ->make(ProductRepositoryInterface::class)
            ->getNewProducts();
    }

    public function mainPageSaleProducts()
    {
        return app()
            ->make(ProductRepositoryInterface::class)
            ->getSaleProducts();
    }
}
