<?php

namespace App\Http\Livewire\Front\Search;

use App\Facade\ProductFacade;
use App\Http\Livewire\Front\Trait\CartTrait;
use App\Http\Livewire\Front\Trait\SortTraitLivewier;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchProductsLiveWier extends Component
{
    use CartTrait;
    use SortTraitLivewier;

    public array|Collection|null $products;

    public string $search = '';

    public string $order;

    public Product $product;

    public int $productQty = 1;

    public int $productsCount = 0;

    protected $listeners = ['refreshSearchProductsLiveWier' => '$refresh', 'updateOrderSelect' => 'updateOrderSelect'];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->products = ProductFacade::searchProducts($this->search);
        $this->productsCount = $this->products->count();
    }

    /**
     * @return void
     */
    public function updatedOrder(): void
    {
        $productsQuery = $this->products;

        $this->products = $this->sortCollection($productsQuery);

        $this->emit('refreshSearchProductsLiveWier');
    }

    /**
     * @param  $value
     * @return void
     */
    public function updateOrderSelect($value): void
    {
        $this->order = $value;

        $productsQuery = $this->products;

        $this->products = $this->sortCollection($productsQuery);

        $this->emit('refreshSearchProductsLiveWier');
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
     * @return View
     */
    public function render(): View
    {
        return view('livewire.front.search.search-products-live-wier');
    }
}
