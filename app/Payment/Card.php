<?php

namespace App\Payment;

class Card implements PaymentMethodInterface
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
            'name' => 'CARD'
        ];
    }
}
