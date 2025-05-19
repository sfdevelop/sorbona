<?php

namespace App\Services\CartOrder;

use App\Http\Livewire\Front\Trait\CartTrait;
use App\Models\Product;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;

class ProductsInCartService
{
    use CartTrait;

    /**
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     *
     */
    public function getProductsInCart($totalDiscounts, $queryProducts): array
    {
        $productsInCartArray = [];
        $productsInCart = $this->getItemsFromCart();

        foreach ($productsInCart as $productItem) {

            $product = $queryProducts->find($productItem->id);
            $productQuantity = $productItem->quantity;
            $withoutDiscount = $product->getPriceWithDiscount($productQuantity);

            $price = $product->getPriceByCount($productQuantity);
            $totalDiscounts += $withoutDiscount ?? $withoutDiscount - $price;
            //            \Log::info("Discount $withoutDiscount Price: $price Total discounts: ".$this->totalDiscounts);
            $productsInCartArray[] = [
                'id'              => $productItem->id,
                'sku'             => $product->sku,
                'slug'            => $product->slug,
                'title'           => $product->title,
                'img'             => $product->img_web,
                'quantity'        => $productQuantity,
                'withoutDiscount' => $withoutDiscount,
                'price'           => $price,
                'item'            => $productItem,
            ];
        }

        return $productsInCartArray;
    }
}