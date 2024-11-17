<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CatalogWithProductViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        public Category $category,
        protected Request $request,
    )
    {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    protected function getSettingPerPage(): int
    {
      return  app()
          ->make(SettingRepositoryInterface::class)
          ->getPerPAge();
    }

    public function categoryProducts()
    {
        $products = app()
            ->make(ProductRepositoryInterface::class)
            ->getCategoryProducts($this->category->id);

        $products = $this->sortProducts($products);

        return $products->paginate($this->getSettingPerPage() ?? 12);
    }

    protected function sortProducts(array|Collection $products)
    {
        return match ($this->request->sort) {
            'asc' => $products->sortBy('now_price'),
            'desc' => $products->sortByDesc('now_price'),
            'default' => $products->sortBy('sort'),
            default => $products,
        };
    }

}
