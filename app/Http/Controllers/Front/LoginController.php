<?php

namespace App\Http\Controllers\Front;

class LoginController extends BaseFrontController
{
    public function __construct() {}

    public function __invoke()
    {
        if (\Auth::check()) {
            return view('front.cabinet.info.info');
        }

        return view('front.login.login');
    }
}
