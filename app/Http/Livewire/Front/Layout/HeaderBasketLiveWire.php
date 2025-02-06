<?php

namespace App\Http\Livewire\Front\Layout;

use App\Http\Livewire\Front\Trait\CartTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HeaderBasketLiveWire extends Component
{
    use CartTrait;

    public int $countInCart = 0;

    public bool $showAddToCart = false;

    public string $title = '';

    public int $productQty = 1;

    public string $img;

    public string $priceWithCount = '';

    public string $total;

    public string $slug;

    protected $listeners = ['refreshCart'];

    public function refreshCart(bool $isShowToast = false, string $slug = '', string $title = '', int $productQty = 0, string $priceWithCount = '', string $totalPriceInCartSolana = '', string $img = '/img/product.png'): void
    {
        $this->title = $title;
        $this->img = $img;
        $this->showAddToCart = ! $isShowToast;
        $this->productQty = $productQty;
        $this->priceWithCount = $priceWithCount;
        $this->total = $totalPriceInCartSolana;
        $this->slug = $slug;
    }

    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $this->countInCart = $this->getShoppingCart()->getDetails()->get('quantities_sum');

        return view('livewire.front.layout.header-basket-live-wire');
    }
}
