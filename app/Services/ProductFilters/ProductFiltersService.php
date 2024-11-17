<?php

namespace App\Services\ProductFilters;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductFiltersService
{
    public function __construct(
        protected Collection $products,
        protected Request $request,
    ) {}

    public function productFilters(): Collection
    {
        $productsFiltered = $this->priceFilter();
        $productsFiltered = $this->manufacturerFilter($productsFiltered);

        return $productsFiltered;
    }

    private function priceRange(): ?array
    {
        $priceRange = $this->request->input('price');

        if ($priceRange) {
            $prices = explode(',', $priceRange);

            if (count($prices) === 2) {
                $minPrice = $prices[0];
                $maxPrice = $prices[1];

                return [
                    'min_price' => $minPrice,
                    'max_price' => $maxPrice,
                ];
            }
        }

        return null;
    }


    private function priceFilter()
    {
        if ( ! $this->request->filled('price')) {
            return $this->products;
        }

        if ( ! $this->priceRange()) {
            return $this->products;
        }

        $arrayPrice = $this->priceRange();

        $minPrice = $arrayPrice['min_price'];
        $maxPrice = $arrayPrice['max_price'];

        return $this->products->filter(function ($product) use ($minPrice, $maxPrice
        ) {
                return $product->now_price >= $minPrice
                    && $product->now_price <= $maxPrice;
            });
    }

    private function manufacturerFilter(Collection $collection): Collection
    {
        if ( ! $this->request->filled('manuf')) {
            return $collection;
        }

        $manufParam = $this->request->input('manuf');

        $manufacturerIds = explode(',', $manufParam);

        $manufacturerIds = array_map('intval', $manufacturerIds);

        return $collection->filter(function ($product) use ($manufacturerIds) {
            return in_array($product->manufacturer_id, $manufacturerIds);
        });
    }
}