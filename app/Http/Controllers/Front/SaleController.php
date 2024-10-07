<?php

namespace App\Http\Controllers\Front;

use App\Repository\Product\ProductRepositoryInterface;
use App\ViewModels\SaleViewModel;
use Spatie\ViewModels\ViewModel;

class SaleController extends BaseFrontController
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
    ) {}

    /**
     * @return SaleViewModel|ViewModel
     */
    public function __invoke(): SaleViewModel|ViewModel
    {
        return (new SaleViewModel($this->productRepository))->view('front.sale.sale');
    }
}
