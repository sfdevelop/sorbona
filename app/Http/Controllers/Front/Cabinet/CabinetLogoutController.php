<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Front\BaseFrontController;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CabinetLogoutController extends BaseFrontController
{
    /**
     * @param  Request  $request
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     */
    public function __invoke(Request $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
