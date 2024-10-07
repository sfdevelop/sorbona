<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Product\ProductRepositoryInterface;

class SaleViewModel extends BaseViewModel
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
    public function saleProducts(): mixed
    {
        $sale = $this->productRepository->getSaleProducts();

        return $sale->paginate(20);
    }
}
