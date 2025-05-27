<?php
namespace App\Http\Controllers\Traits;

use App\Services\CartOrder\RequestProductsFromCart;
use App\Http\Livewire\Front\Trait\CartTrait;

use Jackiedo\Cart\Facades\Cart;
trait CustomCartTrait
{
    public function getCustomCart()
    {
        $_productsInCart = [
            'items' => [],
            'totalDiscounts' => 0,
            'total' => 0
        ];

        $productsInCart = $this->getItemsFromCart();

        $queryProducts = app()
            ->make(RequestProductsFromCart::class)
            ->getProductsFromArrayInCart();

        foreach ($productsInCart as $productItem) {
            $productId = $productItem->id;
            $product = $queryProducts->find($productId);
            $productQuantity = $productItem->quantity;
            $withoutDiscount = $product->getPriceWithDiscount($productQuantity);

            $price = $product->getPriceByCount($productQuantity);
            $_productsInCart['totalDiscounts'] += $withoutDiscount ?? $withoutDiscount - $price;
//            \Log::info("Discount $withoutDiscount Price: $price Total discounts: ".$this->totalDiscounts);
            $_productsInCart['items'][] = [
                'id' => $productId,
                'sku' => $product->sku,
                'slug' => $product->slug,
                'title' => $product->title,
                'img' => $product->img_web,
                'quantity' => $productQuantity,
                'withoutDiscount' => $withoutDiscount,
                'price' => $price,
                'item' => $productItem,
            ];
        }
        $_productsInCart['total'] = $this->getTotalPriceInCartSorbona(queryProducts: $queryProducts);
        return $_productsInCart;
    }
}
