<?php

namespace App\Http\Controllers\Front;

class SignUpController extends BaseFrontController
{
    public function __construct() {}

    public function __invoke()
    {
        return view('front.login.signUp');
    }
}
