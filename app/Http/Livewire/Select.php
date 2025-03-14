<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Select extends Component
{
    public string $selectedNpCity = '';

    public string $selectedNpDepot = '';

    public array|Collection $cities;

    public array|Collection $depot = [];

    public function mount()
    {
        // Отримуємо унікальні регіони з перекладів
        $this->cities = \App\Models\StatesNovaPochta::join('states_nova_pochta_translations', 'states_nova_pochtas.id', '=', 'states_nova_pochta_translations.states_nova_pochta_id')
            ->where('states_nova_pochta_translations.locale', app()->getLocale())
            ->select('states_nova_pochta_translations.region')
            ->distinct()
            ->orderBy('states_nova_pochta_translations.region')
            ->pluck('region')
            ->toArray();
    }

    public function updatedSelectedNpCity($value)
    {
        $this->depot = \App\Models\StatesNovaPochta::join('states_nova_pochta_translations', 'states_nova_pochtas.id', '=', 'states_nova_pochta_translations.states_nova_pochta_id')
            ->where('states_nova_pochta_translations.locale', app()->getLocale())
            ->where('states_nova_pochta_translations.region', $value)
            ->select('states_nova_pochta_translations.city')
            ->distinct()
            ->orderBy('states_nova_pochta_translations.city')
            ->pluck('city')
            ->toArray();

        // Сбрасываем выбранное отделение при изменении города
        $this->selectedNpDepot = '';
    }

    public function updatedSelectedNpDepot($value){
//        dd($this->selectedNpDepot .'-'.$this->selectedNpCity);
    }

    public function render()
    {
        return view('livewire.select');
    }
}
