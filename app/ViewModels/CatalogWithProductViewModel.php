<?php

namespace App\ViewModels;

use App\Http\Controllers\Traits\CustomSeoTrait;
use App\Models\Category;
use App\Repository\Setting\SettingRepositoryInterface;
use App\Services\ProductFilters\ProductFiltersService;
use App\Services\ProductFilters\UrlParametersService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CatalogWithProductViewModel extends BaseViewModel
{
    use CustomSeoTrait;

    public function __construct(
        public ?array $manufacturerArray,
        public Category $category,
        protected Request $request,
        protected Collection $productsInCategory,
        protected ?Collection $filteredProducts = null,
    ) {
        //        $this->setSeoData($this->settingsRepository->getSetting());
    }

    protected function getSettingPerPage(): int
    {
        return app()
            ->make(SettingRepositoryInterface::class)
            ->getPerPAge();
    }

    public function categoryProducts()
    {
        $products = $this->sortProducts($this->productsInCategory);

        $this->filteredProducts = $this->productsInCategory;

        $productsFilter = app()->make(ProductFiltersService::class,
            ['products' => $products, 'request' => $this->request]);
        $products = $productsFilter->productFilters();

        $this->filteredProducts = $products;

        return $products->paginate($this->getSettingPerPage() ?? 12);
    }

    public function allFiltersIds()
    {
        $filterValueIds = $this->filteredProducts->flatMap(function ($product) {
            return $product->filterValues->pluck('id');
        })->unique()->values()->all();

        return $filterValueIds;
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
        $manufacturers = $this->productsInCategory
            ->groupBy('manufacturer.id')
            ->map(function ($products, $manufacturerId) {
                $manufacturer = $products->first()->manufacturer;

                return (object) [
                    'id'            => $manufacturer->id,
                    'name'          => $manufacturer->title,
                    'slug'          => $manufacturer->slug,
                    'product_count' => $products->count(),
                ];
            })->values();

        return collect($manufacturers);
    }

    public function productsAllFilters()
    {
        $filteredProducts = $this->categoryProducts()->getCollection();
        $allProducts = $this->productsInCategory;
        $allProducts->load('filterValues.filter');

        $filters = $allProducts->flatMap(function ($product) {
            return $product->filterValues->map(function ($filterValue) {
                return [
                    'filter_name'        => $filterValue->filter->title,
                    'filter_id'          => $filterValue->filter->id,
                    'filter_parent_slug' => $filterValue->filter->slug,
                    'value'              => [
                        'id'    => $filterValue->id,
                        'title' => $filterValue->title,
                        'slug'  => $filterValue->slug,
                    ],
                ];
            });
        });

        $groupedFilters = $filters->groupBy('filter_id')->map(function ($items, $filterId) use ($filteredProducts) {
            $values = $items->pluck('value')->unique('id')->map(function ($value) use ($filteredProducts) {
                $count = $filteredProducts->filter(function ($product) use ($value) {
                    return $product->filterValues->contains('id', $value['id']);
                })->count();

                return array_merge($value, ['count' => $count]);
            });

            return [
                'filter_name'        => $items->first()['filter_name'],
                'filter_parent_slug' => $items->first()['filter_parent_slug'],
                'filter_id'          => $filterId,
                'values'             => $values,
            ];
        });

        return $groupedFilters;
    }

    public function arrayUrlParameters(): array
    {
        return app()
            ->make(UrlParametersService::class)
            ->getUrlParameters($this->request->query());
    }

    public function arrayParametersValues(): array
    {
        return app()
            ->make(UrlParametersService::class)
            ->getParametersValues();
    }
}
