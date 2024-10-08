<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\ViewModels\SubCategoryViewModel;
use Spatie\ViewModels\ViewModel;

class SubcategoryController extends BaseFrontController
{
    public function __construct(
    ) {}

    /**
     * @param  Category  $category
     * @return SubCategoryViewModel|ViewModel
     */
    public function __invoke(Category $category): SubCategoryViewModel|ViewModel
    {
        return (new SubCategoryViewModel($category))->view('front.subCategory.subCategory');
    }
}
