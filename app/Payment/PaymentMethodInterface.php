<?php

namespace App\Payment;

interface PaymentMethodInterface
{
    public function isValid(): bool;

    public function getPaymentData(): array;
}
