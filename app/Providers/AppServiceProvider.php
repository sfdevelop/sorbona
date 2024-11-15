<?php

namespace App\Providers;

use App\Http\Filters\CategoryFilter;
use App\Models\Category;
use App\Models\Setting;
use App\Services\Translate\TranslateService;
use App\Services\Translate\TranslateServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        //custom paginate
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
        if (Schema::hasTable('categories')) {
            $categories=  Category::query()
                ->whereNull('category_id')
                ->withCount(['childrenCategories', 'products'])
                ->with([
                    'childrenCategories' => function ($query) {
                        $query->withCount('products');
                    }, 'childrenCategories.childrenCategories' => function ($query,
                    ) {
                        $query->withCount('products');
                    },
                ])
                ->withTranslation()
                ->oldest('sort')
                ->paginate();

            View::share('categories', $categories);
        }
    }
}
