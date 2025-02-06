<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class StoreCurrentUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUrl = Url()->current();

        // Если текущий маршрут не "cart", записываем его в сессию
        if (! str_contains($currentUrl, 'cart') && ! str_contains($currentUrl, 'checkout')) {
            Session::put('current_url', $currentUrl);
        }

        return $next($request);
    }
}
