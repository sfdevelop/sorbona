<?php

namespace App\Http\Livewire\Front\Layout;

use App\Http\Livewire\Front\Trait\CartTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class HeaderBasketLiveWire extends Component
{
    use CartTrait;

    public int $countInCart = 0;
    public bool $showAddToCart = false;

    protected $listeners = ['refreshCart'];

    public function refreshCart()
    {
        $this->showAddToCart = true;
    }
    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $this->countInCart = $this->getShoppingCart()->getDetails()->get('quantities_sum');

        return view('livewire.front.layout.header-basket-live-wire');
    }
}
