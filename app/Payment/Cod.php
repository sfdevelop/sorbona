<?php

namespace App\Payment;

class Cod implements PaymentMethodInterface
{
    public function __construct()
    {
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getPaymentData(): array
    {
        return [
            'name' => 'COD'
        ];
    }
}
