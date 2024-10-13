<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Services\ProductAttrebuts\ProductAttributesServiceInterface;
use App\ViewModels\ProductViewModel;

class ProductController extends BaseFrontController
{
    public function __construct(
        public ProductAttributesServiceInterface $productAttributesService
    ) {}

    /**
     * @param  Product  $product
     * @return ProductViewModel
     */
    public function __invoke(Product $product): ProductViewModel
    {
        return (new ProductViewModel($product, $this->productAttributesService))->view('front.product.product');
    }
}
