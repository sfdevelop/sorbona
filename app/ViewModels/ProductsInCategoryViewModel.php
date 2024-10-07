<?php

namespace App\ViewModels;

use App\Models\Category;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductsInCategoryViewModel extends BaseViewModel
{
    //    use CustomSeoTrait;

    public function __construct(
        public Category $category,
        protected Request $request,
        protected ProductRepositoryInterface $productRepository,

    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    public function categoryProducts(): mixed
    {
        $products =
            $this->productRepository->getProductsFromFilter(
                request: $this->request,
                category_id: $this->category->id,
            );

        return $products->paginate(18);
    }

    public function uniqueColors()
    {
        return $this->productRepository->getUniqColorsFromProduct(category_id: $this->category->id);
    }
}
