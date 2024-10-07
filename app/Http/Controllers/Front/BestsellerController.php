<?php

namespace App\Http\Controllers\Front;

use App\Repository\Product\ProductRepositoryInterface;
use App\ViewModels\BestsellerViewModel;
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
