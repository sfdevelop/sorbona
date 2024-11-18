<?php

namespace App\Patterns\Chains;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AllFilter implements ProductFilterInterface
{
    public function __construct(protected Request $request) {}

    public function apply(Collection $products): Collection
    {
        if (! $this->request->filled('filters')) {
            return $products;
        }

        $filtersParam = $this->request->input('filters');
        $filterValueIds = explode(',', $filtersParam);
        $filterValueIds = array_map('intval', $filterValueIds);

        if (! empty($filterValueIds)) {
            $products = $products->filter(function (Product $product) use ($filterValueIds) {
                return $product->filterValues->pluck('id')->intersect($filterValueIds)->isNotEmpty();
            });
        }

        return $products;
    }
}
