<?php

namespace App\ViewModels;

use App\Models\Order;

class CabinetOrderViewModel extends BaseViewModel
{
    public function __construct(
        public Order $order
    ) {}
}
