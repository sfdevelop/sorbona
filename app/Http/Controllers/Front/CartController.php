<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Traits\CartTrait;
use App\ViewModels\CartViewModel;

class CartController extends Controller
{
    use CartTrait;

    public function __construct(

    ) {}

    /**
     * @return CartViewModel|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(): CartViewModel|\Illuminate\Http\RedirectResponse
    {
        return (new CartViewModel)->view('front.cart.cart');
    }
}
