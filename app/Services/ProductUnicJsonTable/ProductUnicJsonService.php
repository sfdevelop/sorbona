<?php

namespace App\Services\ProductUnicJsonTable;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;

class ProductUnicJsonService implements ProductUnicJsonServiceInterface
{
    public function getUnicTitleColor(Collection $products): \Illuminate\Support\Collection
    {
        return $this->getUnicTitles($products, 'colors');
    }

    public function getUnicTitleSize(Collection $products): \Illuminate\Support\Collection
    {
        return $this->getUnicTitles($products, 'sizes');
    }

    /**
     * @param  Collection  $products
     * @param  string  $type
     * @return \Illuminate\Support\Collection
     */
    private function getUnicTitles(Collection $products, string $type): \Illuminate\Support\Collection
    {
        $uniqueIds = $this->uniqueIds($products, $type);
        $model = $type === 'colors' ? Color::trans() : Size::trans();

        $items = $model->whereIn('id', $uniqueIds)->get();

        return $items->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
            ];
        });
    }

    /**
     * @param  Collection  $products
     * @param  string  $type
     * @return array
     */
    private function uniqueIds(Collection $products, string $type): array
    {
        $uniqueIds = [];
        foreach ($products as $product) {
            if ($product->{$type} !== null) {
                $uniqueIds = array_merge($uniqueIds, array_keys($product->{$type}));
            }
        }

        return array_unique($uniqueIds);
    }
}
