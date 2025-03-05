<?php

namespace App\Http\Livewire\Admin;

use App\Models\Filter;
use App\Models\FilterValue;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AddValueFromFilterLiveWier extends Component
{
    public Filter $filter;

    protected $updatesQueryString = ['show'];

    public string $title_uk = '';

    public string $title_ru = '';

    public int $sort = 1;

    public Collection $filters;

    public bool $show = false;

    protected $listeners = ['refreshAddValueFromFilterLiveWier' => '$refresh'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'title_uk' => 'nullable|sometimes|string|max:255',
            'title_ru' => 'required|string|max:255',
            'sort' => 'nullable|sometimes|integer|min:1',
        ];
    }

    public function mount(): void
    {
        $this->show = $this->filter->numeric;
    }

    protected function getValidationAttributes(): array
    {
        return [
            'title_uk' => __('admin.value_uk'),
            'title_ru' => __('admin.value_ru'),
        ];
    }

    public function updatedShow(): void
    {
        $this->emit('refreshAddValueFromFilterLiveWier');
    }

    public function deleteValue(FilterValue $filterValue): void
    {
        $filterValue->delete();

        $this->emit('refreshAddValueFromFilterLiveWier');
    }

    public function addValue(): void
    {
        $data = $this->validate();

        if ($this->show) {
            $data['title_uk'] = $data['title_ru'];
        }

        $this->filter->filterValues()->create([
            'title:ru' => $data['title_ru'],
            'title:uk' => $data['title_uk'],
            'sort' => $data['sort'],
        ]);

        $this->resetData();

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => __('admin.create_ok'), 'reload' => true]);

        $this->emit('refreshAddValueFromFilterLiveWier');
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $this->filters = $this->filter->filterValues;

        return view('livewire.admin.add-value-from-filter-wier');
    }

    private function resetData()
    {
        $this->reset(['title_uk', 'title_ru', 'sort']);
    }
}
