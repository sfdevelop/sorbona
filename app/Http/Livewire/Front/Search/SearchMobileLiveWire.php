<?php

namespace App\Http\Livewire\Front\Search;

use App\Facade\ProductFacade;
use App\Http\Livewire\Front\Trait\CartTrait;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchMobileLiveWire extends Component
{
    use CartTrait;

    public Product $product;

    public int $productQty = 1;

    public string $search = '';

    public array|Collection $searchFourProducts = [];

    public array|Collection $searchThreeProducts = [];

    public int $productsCount = 0;

    /**
     * @param  string  $value
     * @return void
     */
    public function updatedSearch(string $value): void
    {
        if (mb_strlen($value) >= 3) {
            $searchProducts = ProductFacade::searchProducts($value);

            $this->searchFourProducts = $searchProducts->take(4);
            $this->searchThreeProducts = $searchProducts->take(3);
            $this->productsCount = $searchProducts->count();
        } else {
            $this->resetDataLess3();
        }
    }

    /**
     * @param  Product  $product
     * @return void
     */
    public function addToCart(Product $product): void
    {
        $this->product = $product;
        $this->addToCartProduct();
        $this->emit('refreshCartInFrontLiveWier');
    }

    /**
     * @return void
     */
    public function resetData(): void
    {
        $this->reset('search');
        $this->searchFourProducts = [];
        $this->searchThreeProducts = [];
        $this->productsCount = 0;
    }

    public function resetDataLess3(): void
    {
        $this->searchFourProducts = [];
        $this->searchThreeProducts = [];
        $this->productsCount = 0;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $this->search = request()->get('search', $this->search);

        return view('livewire.front.search.search-mobile-live-wire');
    }
}
