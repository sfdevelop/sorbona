<?php

namespace App\Http\Livewire\Front\Checkout;

use App\Http\Livewire\Front\Trait\CartTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class UserLiveWire extends Component
{

    public function render(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        return view('livewire.front.checkout.user-live-wire');
    }
}
