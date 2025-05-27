<?php

namespace App\Http\Livewire\Front\Cart;

use App\Http\Controllers\Traits\CustomCartTrait;
use App\Http\Livewire\Traits\CartTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class BascketRightLiveWier extends Component
{
    use CartTrait;
    use CustomCartTrait;

    public array|object $productsInCart;

    protected $listeners = ['refreshBascketRightLiveWier' => '$refresh'];

    /**
     * @param  $item
     * @return void
     *              Додавання одиниці товару
     */
    public function itemPlus($item): void
    {
        $this->cartProductPlus($item);
        $this->emit('refreshCartInFrontLiveWier');
    }

    /**
     *               Віднімання одиниці товару
     *
     * @param  $item
     * @return \Illuminate\Http\RedirectResponse|void
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function itemMinus($item)
    {
        $this->cartProductMinus($item);
        $this->emit('refreshCartInFrontLiveWier');
        //        $this->emit('refreshCreateOrderLiveWier');

        if ($this->getItemsFromCart()->count() == 0) {
            return redirect()->to(route('cart-clear'));
        }
    }

    /**
     * @param  array  $product
     * @return RedirectResponse|void
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function deleteProductOnCart(array $product)
    {
        $this->deleteItemOnCart(product_id: $product['id'], size: $product['options']['size'], color: $product['options']['color']);
        $this->emit('refreshCartInFrontLiveWier');
        $this->emit('refreshBascketRightLiveWier');

        if ($this->getItemsFromCart()->count() == 0) {
            return redirect()->to(route('no_product_cart'));
        }
    }

    /**
     * Нажатие на кнопку подтверждения заказа в родительском элементе
     *
     * @return void
     */
    public function createOrderRight(): void
    {
        $this->emit('createOrder');
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $this->productsInCart = $this->getCustomCart();
        return view('livewire.front.cart.bascket-right-live-wier');
    }
}
