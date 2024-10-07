<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Product\ProductRepositoryInterface;

class BestsellerViewModel extends BaseViewModel
{
    //    use CustomSeoTrait;

    public function __construct(
        protected ProductRepositoryInterface $productRepository,

    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    /**
     * @return mixed
     */
    public function bestsellerProducts(): mixed
    {
        $sale = $this->productRepository->getBestsellers();

        return $sale->paginate(20);
    }
}
