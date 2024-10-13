<?php

namespace App\Http\Livewire\Admin;

use App\Models\Filter;
use App\Models\FilterValue;
use App\Models\Product;
use Livewire\Component;

class AddFiltersLivewier extends Component
{
    public Product $product;

    public object $filters;

    public ?object $filterValues;

    public int $value_id = 0;
    public ?int $filter_id = null;

    protected $listeners = [
        'filterSelected',
        'valueSelected',
        'refreshAddFiltersLivewier' => '$refresh'
    ];


    public function mount(): void
    {
        $this->filters = Filter::query()->withTranslation()->get();
    }

    public function filterSelected(?int $filterId): void
    {
        $this->filterValues = Filter::find($filterId)?->filterValues ?? null;
    }

    public function valueSelected(int $valueId): void
    {
        $this->value_id = $valueId;
    }

    public function addValueFilterToProduct(): void
    {
        $this->product->filterValues()->attach([$this->value_id]);

        $this->cleanup();
    }

    public function render()
    {
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
