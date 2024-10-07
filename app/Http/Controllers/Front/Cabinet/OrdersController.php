<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Front\BaseFrontController;
use App\ViewModels\CabinetOrdersViewModel;

class OrdersController extends BaseFrontController
{
    public function __construct() {}

    /**
     * @return CabinetOrdersViewModel
     */
    public function __invoke(): CabinetOrdersViewModel
    {
        return (new CabinetOrdersViewModel)->view('front.cabinet.orders.orders');
    }
}
