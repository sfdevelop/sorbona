<?php

namespace App\Http\Livewire\Front\Product;

use App\Http\Livewire\Front\Trait\CartTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Number;
use Jackiedo\Cart\Exceptions\InvalidAssociatedException;
use Jackiedo\Cart\Exceptions\InvalidModelException;
use Livewire\Component;

class ProductLiveWire extends Component
{
    use CartTrait;

    public int $productQty = 1;

    public $product;

    public string $priceProduct;

    public array|object $productsInCart;

    public int|float|string $total;

    //    protected $listeners = ['refreshBascketRightLiveWier' => '$refresh'];

    public function plusQty(): void
    {
        $this->productQty++;
    }

    public function minusQty(): void
    {
        if ($this->productQty > 1) {
            $this->productQty--;
        }
    }

    protected function newPrice(): void
    {
        $priceProduct = $this->product->getPriceByCount($this->productQty);
        $round = round(($priceProduct * $this->productQty), 2);
        $this->priceProduct = Number::currency(number: $round, in: 'UAH', locale: 'uk');
    }

    /**
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     *
     * @throws InvalidAssociatedException
     * @throws InvalidModelException
     */
    public function render(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $this->newPrice();
        $this->total = $this->getTotalPriceInCart();

        return view('livewire.front.product.product-live-wire');
    }
}
