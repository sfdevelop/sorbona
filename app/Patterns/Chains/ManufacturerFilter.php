<?php

namespace App\Patterns\Chains;

use App\Models\Manufacturer;
use App\Services\Manufacturer\ManufacturerService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ManufacturerFilter implements ProductFilterInterface
{
    public function __construct(protected Request $request) {}

    public function apply(Collection $products): Collection
    {
        if (! $this->request->filled('brand')) {
            return $products;
        }

        $brandsParams =
            app()->make(ManufacturerService::class)->getBrandArrayFromUrl();

        $manufacturerIds =
            Manufacturer::query()
                ->whereIn('slug', $brandsParams)
                ->pluck('id')
                ->toArray();

        return $products->filter(function ($product) use ($manufacturerIds) {
            return in_array($product->manufacturer_id, $manufacturerIds);
        });
    }
}
