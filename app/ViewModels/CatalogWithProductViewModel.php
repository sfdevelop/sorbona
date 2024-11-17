<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Setting\SettingRepositoryInterface;
use App\Services\ProductFilters\ProductFiltersService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CatalogWithProductViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        public Category $category,
        protected Request $request,
        protected Collection $productsInCategory,
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
        $products = $this->sortProducts($this->productsInCategory);

        $productsFilter = app()->make(ProductFiltersService::class, ['products' => $products, 'request' => $this->request]);
        $products= $productsFilter->productFilters();

        return $products->paginate($this->getSettingPerPage() ?? 12);
    }

    public function maxPrice()
    {
        return $this->productsInCategory->max('now_price');
    }

    public function minPrice()
    {
        return $this->productsInCategory->min('now_price');
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

    public function productsManufacturers()
    {
        $manufacturers = $this->productsInCategory->groupBy('manufacturer.id')->map(function ($products, $manufacturerId) {
            $manufacturer = $products->first()->manufacturer;
            return (object) [
                'id' => $manufacturer->id,
                'name' => $manufacturer->title,
                'product_count' => $products->count(),
            ];
        })->values();

        return collect($manufacturers);
    }

}
