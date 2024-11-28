<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Services\Manufacturer\ManufacturerService;
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

        if ($category->childrenCategories->count() > 0) {
            return (new CatalogViewModel($category))->view('front.catalog.catalog');
        }

        $products = app()
            ->make(ProductRepositoryInterface::class)
            ->getCategoryProducts($category->id);

        return (new CatalogWithProductViewModel(
            manufacturerArray: app()->make(ManufacturerService::class)->getBrandArrayFromUrl(),
            category: $category,
            request: $request,
            productsInCategory: $products
        ))->view('front.catalog.catalog_with_products');
    }

//    private function getBrandArrayFromUrl(){
//        $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
//            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//
//        $parsedUrl = parse_url($currentUrl);
//
//        if (isset($parsedUrl['query'])) {
//            $params = $parsedUrl['query'];
//
//            $params = preg_replace('/(\$brand=)([^&]*)/', 'brand[]=$2', $params);
//
//            preg_match_all('/brand=([^&]*)/', $params, $matches);
//
//            return $matches[1] ?? [];
//        }
//    }
}
