<?php

namespace App\Http\Controllers\Front;

use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;
use App\ViewModels\BestsellerViewModel;
use App\ViewModels\CatalogViewModel;
use App\ViewModels\SaleViewModel;
use Spatie\ViewModels\ViewModel;

class BestsellerController extends BaseFrontController
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
    ) {}

    /**
     * @return BestsellerViewModel|ViewModel
     */
    public function __invoke(): BestsellerViewModel|ViewModel
    {
        return (new BestsellerViewModel($this->productRepository))->view('front.bestseller.bestseller');
    }
}
