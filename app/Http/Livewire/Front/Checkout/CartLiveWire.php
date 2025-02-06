<?php

namespace App\Http\Livewire\Front\Checkout;

use App\Http\Livewire\Front\Trait\CartTrait;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class CartLiveWire extends Component
{
    use CartTrait;

    public array|object $productsInCart;

    public string $totalDiscounts;

    public int|float|string $total;

    //    protected $listeners = ['refreshCartInFrontLiveWier' => '$refresh'];

    /**
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    /*    public function clickCart()
        {
            if ($this->getQtySum() > 0) {
                return redirect()->to(route('cart'));
            }

            return redirect()->to(route('no_product_cart'));
        }
    */

    public function minusQty($productId) {}

    /**
     * @return Factory|View|\Illuminate\Foundation\Application|Application
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        $this->productsInCart = [];
        $this->totalDiscounts = 0;

        $productsInCart = $this->getItemsFromCart();
        foreach ($productsInCart as $productItem) {
            $productId = $productItem->id;
            $product = Product::find($productId);
            $productQuantity = $productItem->quantity;
            $withoutDiscount = $product->getPriceWithDiscount($productQuantity);

            $price = $product->getPriceByCount($productQuantity);
            $this->totalDiscounts += $withoutDiscount ?? $withoutDiscount - $price;
            \Log::info("Discount $withoutDiscount Price: $price Total discounts: ".$this->totalDiscounts);
            $this->productsInCart[] = [
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
        $this->total = $this->getTotalPriceInCartSorbona();

        return view('livewire.front.checkout.cart-live-wire');
    }
}
