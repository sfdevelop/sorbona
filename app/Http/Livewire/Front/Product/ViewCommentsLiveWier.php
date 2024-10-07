<?php

namespace App\Http\Livewire\Front\Product;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ViewCommentsLiveWier extends Component
{
    public Product $product;

    protected $listeners = ['refreshViewCommentsLiveWier' => '$refresh'];

    /**
     * @return View
     */
    public function render(): View
    {
        $comments = $this->product->comments;

        return view('livewire.front.product.view-comments-live-wier', compact('comments'));
    }
}
