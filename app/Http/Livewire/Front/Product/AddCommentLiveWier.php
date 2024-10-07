<?php

namespace App\Http\Livewire\Front\Product;

use App\Http\Requests\Livewier\CommentProductFrontRequest;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AddCommentLiveWier extends Component
{
    public string $name = '';

    public string $text = '';

    public Product $product;

    public function mount(): void
    {
        if (\Auth::check()) {
            $this->name = \Auth::user()->name;
        }
    }

    /**
     * @return array
     */
    protected function rules(): array
    {
        return (new CommentProductFrontRequest)->rules();
    }

    /**
     * @return void
     */
    public function addComment(): void
    {
        $data = $this->validate();

        $this->product->comments()->create(
            [
                'name' => $data['name'],
                'text' => $data['text'],
                'user_id' => (\Auth::check()) ? \Auth::id() : null,
            ]
        );

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => __('front.comment_added')]);

        $this->dispatchBrowserEvent('closeModal',
            []);

        //        $this->emit('refreshProductCommentsLiveWier');

        if (\Auth::check()) {
            $this->reset(['text']);
        } else {
            $this->reset(['name', 'text']);
        }
    }

    /**
     * @param  $field
     * @return void
     *
     * @throws ValidationException
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.front.product.add-comment-live-wier');
    }
}
