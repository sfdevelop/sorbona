<?php

namespace App\Patterns\Strategy\OrderItems;

class CartDetailsArrayConversion implements ConversionStrategy
{
    public function convert($data): array
    {
        $result = [];

        foreach ($data['items'] as $item) {

            $result[] = [
                'title' => $item['title'],
                'sku' => $item['sku'],
                'slug' => $item['slug'],
                'qty' => $item['quantity'],
                'price_item' => $item['price'],
                'price_all' => $item['price'] * $item['quantity'],
                'img' => $item['img'],
                'size' => $item['size'] ?? '',
                'color' => $item['color'] ?? '',
            ];
        }

        return $result;
    }
}
