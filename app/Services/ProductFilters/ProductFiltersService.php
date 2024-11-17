<?php

namespace App\Services\ProductFilters;

use App\Patterns\Chains\ManufacturerFilter;
use App\Patterns\Chains\PriceFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Patterns\Chains\ProductFilterInterface;

class ProductFiltersService
{
    protected array $filters;

    public function __construct(
        protected Collection $products,
        protected Request $request,
    ) {
        $this->filters = [
            new PriceFilter($this->request),
            new ManufacturerFilter($this->request),
        ];
    }

    public function productFilters(): Collection
    {
        $filteredProducts = $this->products;

        foreach ($this->filters as $filter) {
            $filteredProducts = $filter->apply($filteredProducts);
        }

        return $filteredProducts;
    }
}