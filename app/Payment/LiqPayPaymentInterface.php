<?php

namespace App\Payment;

use App\Models\Order;

interface LiqPayPaymentInterface
{
    public function LiqPayPaymentClass(Order $order): string;
}
