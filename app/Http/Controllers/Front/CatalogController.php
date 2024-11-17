<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\ViewModels\CatalogViewModel;
use App\ViewModels\CatalogWithProductViewModel;
use Illuminate\Http\Request;

class CatalogController extends BaseFrontController
{
    public function __construct(
        public CategoryRepositoryInterface $categoryRepository,
    ) {}


    public function __invoke(Category $category, Request $request)
    {
        $category->load('childrenCategories');

        if ($category->childrenCategories->count() > 0){
            return (new CatalogViewModel($category))->view('front.catalog.catalog');
        }

        $products = app()
            ->make(ProductRepositoryInterface::class)
            ->getCategoryProducts($category->id);

        return (new CatalogWithProductViewModel(
            category: $category,
            request: $request,
            productsInCategory: $products
        ))->view('front.catalog.catalog_with_products');
    }
}
