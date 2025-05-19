<?php

namespace App\Http\Controllers\Front;

use App\ViewModels\RecoverViewModel;

class RecoverController extends BaseFrontController
{
    public function __construct() {}

    public function __invoke()
    {
        return (new RecoverViewModel)->view('front.login.recover');
    }
}
