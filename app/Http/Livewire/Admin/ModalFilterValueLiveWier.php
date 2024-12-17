<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\FilterValue;

class ModalFilterValueLiveWier extends Component
{
    public $filterValue;
    public $title_uk;
    public $title_ru;
    public $sort = 1;

    public bool $show = true;

    protected $rules = [
        'title_uk' => 'nullable|min:3',
        'title_ru' => 'required|min:3',
        'sort' => 'required',
    ];

    public function mount($filterValue)
    {
        $this->filterValue =
            FilterValue::with('translations')->find($filterValue);
        if ($this->filterValue) {
            $this->title_uk =
                $this->filterValue->translations->where('locale', 'uk')
                    ->first()->title ?? '';
            $this->title_ru =
                $this->filterValue->translations->where('locale', 'ru')
                    ->first()->title ?? '';

            $this->sort = $this->filterValue->sort;
        }
    }

    public function updateFilterValue()
    {
        $this->validate();

        if ($this->filterValue->filter->numeric) {

            $this->filterValue->translations()->updateOrCreate(
                ['locale' => 'uk'],
                ['title' => $this->title_ru],
            );

        } else{

            $this->filterValue->translations()->updateOrCreate(
                ['locale' => 'uk'],
                ['title' => $this->title_uk],
            );

        }

        $this->filterValue->translations()->updateOrCreate(
            ['locale' => 'ru'],
            ['title' => $this->title_ru],
        );

        $this->filterValue->update(['sort' => $this->sort]);

//        $this->emit('filterValueUpdated');

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'Данные успешно обновлены', 'reload' => true]);
    }

    public function showClick(): void
    {
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.admin.modal-filter-value-live-wier');
    }
}
