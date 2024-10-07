<?php

namespace App\Services\PaymentOrder;

use App\Models\Order;

interface PaymentOrderInterface
{
    public function payment(string $payment, Order $order);
}
