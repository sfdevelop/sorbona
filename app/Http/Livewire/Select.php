<?php

namespace App\Http\Livewire;

use App\Actions\Order\GetCityNovaPochtaAction;
use App\Actions\Order\GetDepotNovaPochtaAction;
use App\Models\NovaPochta\NovaPochtaCity;
use App\Models\NovaPochta\NovaPochtaDepot;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Select extends Component
{
    public string $selectedNpCity = '';

    public string $selectedNpDepot = '';
    public string $city_ref= '';

    public array|Collection $cities;

    public string $city = '';
    public string $depot = '';

    public array|Collection $depots = [];

    public $rules = [
        'selectedNpCity'  => 'required',
        'selectedNpDepot' => 'required',
        'city' => 'required',
    ];

    protected $listeners = [
        'validateNp' => 'validateNp',
    ];

    public function validateNp($selectedNpCity, $selectedNpDepot)
    {
        $this->selectedNpCity = $selectedNpCity;
        $this->selectedNpDepot = $selectedNpDepot;

        $this->validate();
    }

    public function updated($field): void
    {

        $locale = app()->getLocale() == 'uk' ? 'uk' : app()->getLocale();

        if ($field === 'city' && mb_strlen($this->city) > 2) {

            $this->cities = NovaPochtaCity::query()
                ->select('ref', 'name_ru', 'name_uk')
                ->whereRaw("SUBSTRING_INDEX(name_{$locale}, '(', 1) LIKE ?", ["%{$this->city}%"])
                ->orderBy("name_{$locale}")
                ->take(50)
                ->once()
                ->sortBy(function ($city) use ($locale) {
                    $name = $city->{"name_{$locale}"};

                    return [
                        str_contains($name, '(') ? 1 : 0,
                        $name,
                    ];
                })
                ->values();

        } else {

            $this->cities = [];
            $this->selectedNpCity = '';

        }

        if ($field === 'depot' && mb_strlen($this->depot) > 0) {
            $this->depots = NovaPochtaDepot::query()
                ->select('ref', 'name_ru', 'name_uk')
                ->whereRaw("SUBSTRING_INDEX(name_{$locale}, '(', 1) LIKE ?", ["%{$this->depot}%"])
                ->where('city_ref', $this->city_ref)
                ->orderBy("depot_number")
                ->get();
        } else {
            $this->selectBranches = [];
        }
    }

    public function selectCity(string $ref , string  $name): void
    {
        $this->city = $name;
        $this->selectedNpCity = $name;
        $this->cities = [];

        $this->city_ref = $ref;
        $this->depot = '';
        $this->emit('updatedSelectedNpCity', $this->city_ref);
    }

    public function selectDepot(string $ref , string $name): void
    {
        $this->depot = $name;
        $this->selectedNpDepot = $name;
        $this->depots = [];

        $this->emit('updatedSelectedNpDepot',  $ref);
    }

    public function updatedSelectedNpCity($value)
    {
        $this->emit('updatedSelectedNpCity', $value);
        // Сбрасываем выбранное отделение при изменении города
        $this->selectedNpDepot = '';
    }

    public function updatedSelectedNpDepot($value)
    {
        $this->emit('updatedSelectedNpDepot', $value);
//        dd($this->selectedNpDepot .'-'.$this->selectedNpCity);
    }

    public function render()
    {

        if ( ! empty($this->selectedNpCity)) {
            $this->depots =
                GetDepotNovaPochtaAction::run($this->selectedNpCity);
        }

        return view('livewire.select');
    }
}
