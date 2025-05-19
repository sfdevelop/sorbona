<?php

namespace App\Actions\Order;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\NovaPochta\NovaPochtaDepot;

class GetDepotNovaPochtaAction
{
    use AsAction;

    /**
     * @param  string  $regionName
     * @return NovapochtaTranslation[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function handle(string $city_ref): array|Collection|\Illuminate\Support\Collection
    {
        $locale = app()->getLocale() == 'uk' ? 'uk' : app()->getLocale();

        return NovaPochtaDepot::query()
            ->select('ref', 'name_ru', 'name_uk')
            ->where('city_ref', $city_ref)
            ->orderBy("depot_number")
            ->get();
    }
}
