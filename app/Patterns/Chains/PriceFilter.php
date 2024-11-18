<?php

namespace App\Patterns\Chains;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PriceFilter implements ProductFilterInterface
{
    public function __construct(protected Request $request) {}

    public function apply(Collection $products): Collection
    {
        if (! $this->request->filled('price')) {
            return $products;
        }

        $priceRange = $this->request->input('price');
        $prices = explode(',', $priceRange);

        if (count($prices) !== 2) {
            return $products;
        }

        $minPrice = $prices[0];
        $maxPrice = $prices[1];

        return $products->filter(function ($product) use ($minPrice, $maxPrice) {
            return $product->now_price >= $minPrice && $product->now_price <= $maxPrice;
        });
    }
}
