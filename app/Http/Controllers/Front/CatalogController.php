<?php

namespace App\Http\Controllers\Front;

use App\Repository\Category\CategoryRepositoryInterface;
use App\ViewModels\CatalogViewModel;

class CatalogController extends BaseFrontController
{
    public function __construct(
        public CategoryRepositoryInterface $categoryRepository,
    ) {}

    /**
     * @return CatalogViewModel
     */
    public function __invoke(): CatalogViewModel
    {
        return (new CatalogViewModel($this->categoryRepository))->view('front.catalog.catalog');
    }
}
