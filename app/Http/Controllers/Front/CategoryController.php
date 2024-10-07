<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Services\ProductUnicJsonTable\ProductUnicJsonServiceInterface;
use App\ViewModels\CategoryViewModel;
use Illuminate\Http\Request;

class CategoryController extends BaseFrontController
{
    public function __construct(
        public ProductUnicJsonServiceInterface $unicJsonService,
    ) {}

    /**
     * @param  Category  $category
     * @param  Request  $request
     * @return CategoryViewModel
     */
    public function __invoke(Category $category, Request $request): CategoryViewModel
    {
        return (new CategoryViewModel($category, $this->unicJsonService, $request))->view('front.Category.category');
    }
}
