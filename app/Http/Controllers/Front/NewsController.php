<?php

namespace App\Http\Controllers\Front;

use App\ViewModels\NewsViewModel;

class NewsController extends BaseFrontController
{
    public function __construct(
    ) {}

    public function __invoke()
    {
        return (new NewsViewModel)->view('front.news.news');
    }
}
