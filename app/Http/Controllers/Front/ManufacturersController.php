<?php

namespace App\Http\Controllers\Front;

use App\Repository\Category\CategoryRepositoryInterface;
use App\ViewModels\CatalogViewModel;
use App\ViewModels\ManufacturersViewModel;

class ManufacturersController extends BaseFrontController
{
    public function __construct(
    ) {}


    public function __invoke()
    {
        return (new ManufacturersViewModel())->view('front.manufacturer.manufacturers');
    }
}
