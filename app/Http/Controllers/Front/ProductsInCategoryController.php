<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Repository\Product\ProductRepositoryInterface;
use App\ViewModels\ProductsInCategoryViewModel;
use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;

class ProductsInCategoryController extends BaseFrontController
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
    ) {}

    /**
     * @param  Category  $category
     * @param  Request  $request
     * @return ProductsInCategoryViewModel|ViewModel
     */
    public function __invoke(Category $category, Request $request): ProductsInCategoryViewModel|ViewModel
    {
        return (new ProductsInCategoryViewModel(
            category: $category,
            request: $request,
            productRepository: $this->productRepository,
        ))->view('front.productsInCategory.productsInCategory');
    }
}
