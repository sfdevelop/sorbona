<?php

namespace App\Http\Controllers\Front;

use App\ViewModels\SignUpViewModel;

class SignUpController extends BaseFrontController
{
    public function __construct() {}

    public function __invoke()
    {
        return (new SignUpViewModel)->view('front.login.signUp');
    }
}
