<?php

namespace App\Http\Livewire\Front\Cart;

use App\Http\Controllers\Traits\CustomCartTrait;
use App\Http\Livewire\Front\Trait\CartTrait;
use App\Models\Product;
use App\Services\CartOrder\RequestProductsFromCart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class CartLiveWire extends Component
{
    use CartTrait;
    use CustomCartTrait;

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
        $this->productsInCart = $this->getCustomCart();
        return view('livewire.front.cart.cart-live-wire');
    }
}
