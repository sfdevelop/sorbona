<?php

namespace App\Providers;

use App\Http\Middleware\SetLangAdminMiddleware;
use App\Http\Middleware\StoreCurrentUrl;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = 'admin/start';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', StoreCurrentUrl::class, 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', SetLangAdminMiddleware::class])
                ->namespace($this->namespace)
                ->prefix(LaravelLocalization::setLocale())
                ->group(base_path('routes/front.php'));

            Route::middleware(['web', 'auth', 'role:admin', SetLangAdminMiddleware::class])
                ->namespace($this->namespace)
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware(['web', StoreCurrentUrl::class, 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'role:user|smallopt|bigopt', SetLangAdminMiddleware::class])
                ->namespace($this->namespace)
                ->prefix(LaravelLocalization::setLocale().'/cabinet')
                ->group(base_path('routes/cabinet.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
