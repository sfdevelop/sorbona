<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Repository\Category\CategoryRepositoryInterface;

class CatalogViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository,

    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    /**
     * @return mixed
     */
    public function categories(): mixed
    {
        return $this->categoryRepository->getCategoriesWithoutChildrenCategories();
    }
}
