<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\Livewier\ProductValueRequest;
use App\Models\Filter;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AddFiltersLivewier extends Component
{
    public Product $product;

    public object $filters;

    public object $productFilters;

    public ?object $filterValues;

    public ?int $value_id = null;

    public ?int $filter_id = null;

    protected $listeners = [
        'filterSelected',
        'valueSelected',
        'refreshAddFiltersLivewier' => '$refresh',
    ];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return (new ProductValueRequest)->rules();
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

    public function mount(): void
    {
        $this->filters = Filter::query()->withTranslation()->get();
    }

    public function filterSelected(?int $filterId): void
    {
        $this->filterValues = Filter::find($filterId)?->filterValues ?? null;
    }

    public function valueSelected($valueId): void
    {
        if ($valueId !== null && $valueId !== '') {
            $this->value_id = $valueId;
        } else {
            $this->value_id = null;
        }
    }

    public function addValueFilterToProduct(): void
    {
        $this->validate();

        $this->product->filterValues()->attach([$this->value_id]);

        $this->cleanup();
    }

    public function deleteAttribute(int $attributeId): void
    {
        \DB::table('product_filter_value')
            ->where('filter_value_id', $attributeId)
            ->delete();

        $this->dispatchBrowserEvent('alert',
            ['type' => 'warning', 'message' => 'Запис успішно видалений']);

        $this->emit('refreshAddFiltersLivewier');
    }

    public function render(
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        $this->productFilters = $this->product->filterValues;

        return view('livewire.admin.add-filters-livewier');
    }

    public function cleanup(): void
    {
        $this->reset(['value_id', 'filter_id']);
        $this->filterSelected(null);
        $this->filterValues = null;
        $this->emit('refreshAddFiltersLivewier');
    }
}
