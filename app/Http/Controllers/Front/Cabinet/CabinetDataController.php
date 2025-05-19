<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Front\BaseFrontController;
use App\ViewModels\CabinetDataViewModel;

class CabinetDataController extends BaseFrontController
{
    public function __construct(
    ) {}

    public function __invoke()
    {
        return (new CabinetDataViewModel
        )->view('front.cabinet.data.data');
    }
}
