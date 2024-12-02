<?php

namespace App\Patterns\Chains;

use App\Models\FilterValue;
use App\Models\Product;
use App\Services\ProductFilters\UrlParametersService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AllFilter implements ProductFilterInterface
{
    public function __construct(protected Request $request) {}

    public function apply(Collection $products): Collection
    {
$parametersSlugs = app()
    ->make(UrlParametersService::class)
    ->getParametersValues();

        $filterValueIds =
            FilterValue::query()
                ->whereIn('slug', $parametersSlugs)
                ->pluck('id')
                ->toArray();

        if (! empty($filterValueIds)) {
            $products = $products->filter(function (Product $product) use ($filterValueIds) {
                return $product->filterValues->pluck('id')->intersect($filterValueIds)->isNotEmpty();
            });
        }

        return $products;
    }
}
