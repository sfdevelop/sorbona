<?php

namespace App\Http\Livewire\Front\Wishlist;

use App\Http\Livewire\Traits\WishListTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CountWishlistLiveWier extends Component
{
    use WishListTrait;

    public int $count = 0;

    protected $listeners = ['refreshCountWishlistLiveWier' => '$refresh', 'refreshCountList' => 'modelRefresh'];

    /**
     * @return void
     */
    public function modelRefresh(): void
    {
        $this->count = $this->countWishlist();

        $this->emit('refreshCountWishlistLiveWier');
    }

    /** +
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        $this->count = $this->countWishlist();

        return view('livewire.front.wishlist.count-wishlist-live-wier');
    }
}
