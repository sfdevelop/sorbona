<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Repository\Product\ProductRepositoryInterface;
use App\ViewModels\SearchInCategoryViewModel;
use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;

class SearchInCategoryController extends BaseFrontController
{
    public function __construct(
        public ProductRepositoryInterface $productRepository,
    ) {}

    /**
     * @param  Category  $category
     * @param  Request  $request
     * @return SearchInCategoryViewModel|ViewModel
     */
    public function __invoke(Category $category, Request $request): SearchInCategoryViewModel|ViewModel
    {
        $search = request('search');

        return (new SearchInCategoryViewModel(
            category: $category,
            query: $search,
            request: $request,
            productRepository: $this->productRepository,
        ))->view('front.searchInCategory.searchInCategory');
    }
}
