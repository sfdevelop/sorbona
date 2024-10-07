<?php

namespace App\Http\Livewire\Front\Product;

use App\Http\Livewire\Traits\CartTrait;
use App\Http\Livewire\Traits\WishListTrait;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AddToCartLiveWier extends Component
{
    use CartTrait;
    use WishListTrait;

    public Product $product;

    public int $productQty = 1;

    public array $sizes = [];

    public array $colors = [];

    public string $priceProduct;

    public string $size = '';

    public string $color = '';

    public string $errorSize = '';

    public string $errorColor = '';

    public bool $toAdd = false;

    public array $wishList = [];

    protected $listeners = ['refreshAddToCartLiveWier' => '$refresh'];

    public function mount(): void
    {
        $this->priceProduct = $this->product->now_price;

        if (in_array($this->product->id, $this->wishList)) {
            $this->toAdd = true;
        }
    }

    /**
     * @return void
     */
    public function toggleProductToWishList(): void
    {
        $this->toAdd = $this->addToWishList($this->product, $this->toAdd);

        $this->emit('refreshCountList');
    }

    /**
     * @return void
     */
    public function plusQty(): void
    {
        $this->productQty = ++$this->productQty;

        $this->newPrice();
    }

    /**
     * @return void
     */
    public function minusQty(): void
    {
        $this->productQty = --$this->productQty;

        $this->newPrice();
    }

    /**
     * @param  string  $size
     * @return void
     */
    public function changeSize(string $size): void
    {
        $this->size = $size;
        $this->errorSize = '';
    }

    /**
     * @param  string  $color
     * @return void
     */
    public function changeColor(string $color): void
    {
        $this->color = $color;
        $this->errorColor = '';
    }

    /**
     * @return void
     */
    public function addToCart(): void
    {
        if (collect($this->product->sizes)->count() > 0 && $this->size == '') {
            $this->errorSize = __('front.error_size');

            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('front.error_attr')]);

            return;
        }

        if (collect($this->product->colors)->count() > 0 && $this->color == '') {
            $this->errorColor = __('front.error_color');

            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => __('front.error_attr')]);

            return;
        }

        $this->addToCartProduct();
        $this->emit('refreshCartInFrontLiveWier');
    }

    protected function newPrice(): void
    {
        $priceProduct = \strPriceToFloat($this->product->now_price);

        $round = round(($priceProduct * $this->productQty), 2);

        $this->priceProduct = currencyUAH($round);
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.front.product.add-to-cart-live-wier');
    }
}
