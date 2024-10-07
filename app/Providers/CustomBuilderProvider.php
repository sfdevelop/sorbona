<?php

namespace App\Providers;

use Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CustomBuilderProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //custom paginate
        Collection::macro('paginate', function ($perPage = 20, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator($this->forPage($page, $perPage), $total ?: $this->count(), $perPage, $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Builder::macro('once', function () {
            $key = 'query_once_'.md5($this->toSql().serialize($this->getBindings()));

            return Cache::remember($key, now()->addSeconds(5), function () {
                return $this->get();
            });
        });
    }
}
