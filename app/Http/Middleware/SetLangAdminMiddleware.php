<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLangAdminMiddleware
{
    /**
     * @param  Request  $request
     * @param  Closure  $next
     * @return Response
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = is_null(session()->get('locale')) ? config('bureviy.DEFAULT_LANG') : session()->get('locale');
        app()->setLocale($lang);

        if ($request->is('admin/*')) {
            app()->setLocale('uk');
        }

        return $next($request);
    }
}
