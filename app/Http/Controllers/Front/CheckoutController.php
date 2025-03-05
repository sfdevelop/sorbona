<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Front\Trait\CartTrait;
use App\ViewModels\CheckoutViewModel;

class CheckoutController extends Controller
{
    use CartTrait;

    public function __construct(

    ) {}

    public function __invoke()
    {
        if ($this->getItemsFromCart()->count() == 0) {
            return redirect()->route('cart');
        }

        return (new CheckoutViewModel)->view('front.checkout.checkout');
    }
}
