<?php

namespace App\Http\Controllers\Front\Cabinet;

use App\Http\Controllers\Front\BaseFrontController;
use App\Models\Order;
use App\ViewModels\CabinetOrderViewModel;

class OrderController extends BaseFrontController
{
    public function __construct() {}

    /**
     * @param  Order  $order
     * @return CabinetOrderViewModel
     */
    public function __invoke(Order $order): CabinetOrderViewModel
    {
        if ($order->user_id !== \Auth::id()) {
            abort(403);
        }

        return (new CabinetOrderViewModel($order))->view('front.cabinet.order.order');
    }
}
