<?php

namespace App\Http\Livewire\Front\Layout;

use App\Http\Livewire\Front\Trait\CartTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HeaderUserLiveWire extends Component
{
    use CartTrait;

    protected $listeners = ['refreshHeaderUser' => '$refresh'];

    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.front.layout.header-user-live-wire');
    }
}
