<?php

namespace App\Http\Controllers\Front;

use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Repository\Slider\SliderRepositoryInterface;
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
        return (new HomepageViewModel())->view('front.home.home');
    }
}
