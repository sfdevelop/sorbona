<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Category;
use App\Repository\Product\ProductRepositoryInterface;

class CatalogViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(public Category $category)
    {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    public function randomProducts()
    {
        $categories_id =
            $this->category
                ->childrenCategories
                ->pluck('id')
                ->toArray();

        return app()
            ->make(ProductRepositoryInterface::class)
            ->getRandomProductsInIdCategories($categories_id);
    }
}
