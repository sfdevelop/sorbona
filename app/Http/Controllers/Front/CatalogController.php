<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\ViewModels\CatalogViewModel;

class CatalogController extends BaseFrontController
{
    public function __construct(
        public CategoryRepositoryInterface $categoryRepository,
    ) {}


    public function __invoke(Category $category)
    {
        $category->load('childrenCategories');

        if ($category->childrenCategories->count() > 0){
            return (new CatalogViewModel($category))->view('front.catalog.catalog');
        }

    }
}
