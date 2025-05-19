<?php

namespace App\Actions\Order;

use App\Models\NovaPochta\NovaPochtaCity;
use App\Models\NovapochtaTranslation;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCityNovaPochtaAction
{
    use AsAction;

    /**
     * @param  string  $regionName
     * @return NovapochtaTranslation[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function handle(string $regionName): array|Collection|\Illuminate\Support\Collection
    {
        /*        return NovapochtaTranslation::query()
                    ->select('city', DB::raw('MAX(id) as max_id'))
                    ->where('locale', app()->getLocale() == 'en' ? 'uk' : app()->getLocale())
                    ->where('region', $regionName)
                    ->groupBy('city')
                    ->orderBy('city')
                    ->get();
        */
        $locale = app()->getLocale() == 'uk' ? 'uk' : app()->getLocale();

//        dd($locale);
        return NovaPochtaCity::query()
            ->select('ref', 'name_ru', 'name_uk')
            ->orderBy("name_{$locale}")
            ->once();
    }
}
