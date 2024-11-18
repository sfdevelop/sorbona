<?php

namespace App\Patterns\Chains;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ManufacturerFilter implements ProductFilterInterface
{
    public function __construct(protected Request $request) {}

    public function apply(Collection $products): Collection
    {
        if (! $this->request->filled('manuf')) {
            return $products;
        }

        $manufParam = $this->request->input('manuf');
        $manufacturerIds = explode(',', $manufParam);
        $manufacturerIds = array_map('intval', $manufacturerIds);

        return $products->filter(function ($product) use ($manufacturerIds) {
            return in_array($product->manufacturer_id, $manufacturerIds);
        });
    }
}
