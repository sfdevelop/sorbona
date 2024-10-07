<?php

namespace App\Patterns\Strategy\OrderItems;

class CartDetailsConversion implements ConversionStrategy
{
    public function convert($data): array
    {
        $result = [];

        foreach ($data as $item) {
            $result[] = [
                'title' => $item->get('title'),
                'qty' => $item->get('quantity'),
                'price_item' => $item->get('price'),
                'price_all' => $item->get('total_price'),
                'img' => $item->options->img,
                'size' => $item->options->size ?? '',
                'color' => $item->options->color ?? '',
            ];
        }

        return $result;
    }
}
