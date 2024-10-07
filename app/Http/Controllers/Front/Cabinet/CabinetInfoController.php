<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Front\BaseFrontController;
use App\ViewModels\CabinetInfoViewModel;

class CabinetInfoController extends BaseFrontController
{
    public function __construct(
    ) {}

    public function __invoke()
    {
        return (new CabinetInfoViewModel
        )->view('front.cabinet.info.info');
    }
}
