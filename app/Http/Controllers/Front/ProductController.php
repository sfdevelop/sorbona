<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Services\ProductAttrebuts\ProductAttributesServiceInterface;
use App\Services\SeeProduct\SeeProductsService;
use App\ViewModels\ProductViewModel;

class ProductController extends BaseFrontController
{
    public function __construct() {}

    /**
     * @param  Product  $product
     *
     * @return ProductViewModel
     */
    public function __invoke(Product $product): ProductViewModel
    {
        app()
            ->make(SeeProductsService::class)
            ->updateRecentlyViewedProducts($product->id);

        return (new ProductViewModel($product))->view('front.product.product');
    }
}
