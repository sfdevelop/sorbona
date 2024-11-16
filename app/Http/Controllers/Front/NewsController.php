<?php

namespace App\Http\Controllers\Front;

use App\Repository\Category\CategoryRepositoryInterface;
use App\ViewModels\CatalogViewModel;
use App\ViewModels\ManufacturersViewModel;
use App\ViewModels\NewsViewModel;

class NewsController extends BaseFrontController
{
    public function __construct(
    ) {}


    public function __invoke()
    {
        return (new NewsViewModel())->view('front.news.news');
    }
}
