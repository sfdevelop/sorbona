<?php

namespace App\Providers;

use App\Models\Setting;
use App\Services\Translate\TranslateService;
use App\Services\Translate\TranslateServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Number;
use NumberFormatter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        // custom paginate
        Collection::macro('paginate', function ($perPage = 20, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator($this->forPage($page, $perPage), $total ?: $this->count(), $perPage, $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]);
        });

        $this->app->bind(
            TranslateServiceInterface::class,
            TranslateService::class
        );

        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('ru_RU');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Number::macro('formatCurrencyUAH', function ($value) {
            $formatter = new NumberFormatter('uk_UA', NumberFormatter::CURRENCY);
            $formatter->setSymbol(NumberFormatter::CURRENCY_SYMBOL, 'грн');

            return $formatter->formatCurrency($value, 'UAH');
        });

        if (Schema::hasTable('settings')) {
            $settings = Setting::query()
                ->first();

            View::share('settings', $settings);
        }
    }
}
