<?php

namespace App\Patterns\Strategy\OrderItems;

class ProductCollectionConversion implements ConversionStrategy
{
    public function convert($data): array
    {
        return $data->map(function ($product) {
            return [
                'title' => $product->title, 'sku' => $product->sku,
                'qty' => 1,
                'price_item' => $product->price,
                'price_all' => $product->price * 1,
                'img' => $product->img_jpg,
                'size' => $product->size ?? '',
                'color' => $product->color ?? '',
            ];
        })->toArray();
    }
}
