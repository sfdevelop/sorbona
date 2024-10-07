<?php

namespace App\Payment;

interface LiqPayPaymentInterface
{
    public function LiqPayPaymentClass($order): string;
}
