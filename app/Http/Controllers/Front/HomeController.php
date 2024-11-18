<?php

namespace App\Http\Controllers\Front;

use App\ViewModels\HomepageViewModel;

class HomeController extends BaseFrontController
{
    public function __construct(

    ) {}

    /**
     * @return HomepageViewModel
     */
    public function __invoke(): HomepageViewModel
    {
        return (new HomepageViewModel)->view('front.home.home');
    }
}
