<?php

namespace App\Http\Controllers\Front;

use App\ViewModels\LoginViewModel;

class LoginController extends BaseFrontController
{
    public function __construct() {}

    public function __invoke()
    {
        if (\Auth::check()) {
            return (new LoginViewModel)->view('front.cabinet.info.info');
        }

        return (new LoginViewModel)->view('front.login.login');
    }
}
