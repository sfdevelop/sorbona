<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Livewier\ColorToProductAdminRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AddColorsToProductLiveWier extends Component
{
    public Product $product;

    public string $color = '';

    public array|Collection $colors = [];

    protected $listeners = ['refreshAddColorsToProductLiveWier' => '$refresh'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return (new ColorToProductAdminRequest)->rules();
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

    /**
     * @return void
     */
    public function addColor(): void
    {
        try {
            $data = $this->validate();
            $this->product->productColors()->attach($data['color']);

            $this->reset(['color']);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('toastr.add_attribute')]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('toastr.error_attribute')]);
        }

        $this->emit('refreshAddColorsToProductLiveWier');
    }

    public function deleteAttribute(string $colorTitle): void
    {
        try {
            $this->product->productColors()->detach($colorTitle);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => __('toastr.delete_attribute')]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => __('toastr.error_wrong_attribute').Carbon::now()]);
        }

        $this->emit('refreshAddColorsToProductLiveWier');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        $this->product->load('productColors');
        $this->colors = $this->product->productColors;

        return view('livewire.admin.add-colors-to-product-live-wier');
    }
}
