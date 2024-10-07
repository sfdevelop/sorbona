<?php

namespace App\Http\Livewire\Front\Cart;

use App\Http\Livewire\Traits\CartTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class CartInFrontLiveWier extends Component
{
    use CartTrait;

    public int $countItems = 0;

    protected $listeners = ['refreshCartInFrontLiveWier' => '$refresh'];

    /**
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function clickCart()
    {
        if ($this->getQtySum() > 0) {
            return redirect()->to(route('cart'));
        }

        return redirect()->to(route('no_product_cart'));
    }

    /**
     * @return Factory|View|\Illuminate\Foundation\Application|Application
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        $this->countItems = $this->getQtySum();

        return view('livewire.front.cart.cart-in-front-live-wier');
    }
}
