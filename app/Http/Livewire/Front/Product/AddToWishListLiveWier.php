<?php

namespace App\Http\Livewire\Front\Product;

use App\Http\Livewire\Traits\WishListTrait;
use App\Models\Product;
use Livewire\Component;

class AddToWishListLiveWier extends Component
{
    use WishListTrait;

    public bool $toAdd = false;

    public array $wishList = [];

    public ?int $product_id = null;

    public function mount(): void
    {
        if (in_array($this->product_id, $this->wishList)) {
            $this->toAdd = true;
        }
    }

    /**
     * @return void
     */
    public function toggleProductToWishList(): void
    {
        $this->toAdd = $this->addToWishList(Product::find($this->product_id), $this->toAdd);

        $this->emit('refreshCountList');
    }

    public function render()
    {
        return view('livewire.front.product.add-to-wish-list-live-wier');
    }
}
