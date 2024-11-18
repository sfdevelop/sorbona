<?php

namespace App\Http\Controllers\Front;

use App\ViewModels\ManufacturersViewModel;

class ManufacturersController extends BaseFrontController
{
    public function __construct(
    ) {}

    public function __invoke()
    {
        return (new ManufacturersViewModel)->view('front.manufacturer.manufacturers');
    }
}
