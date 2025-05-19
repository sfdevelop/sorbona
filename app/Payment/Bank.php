<?php

namespace App\Payment;

class Bank implements PaymentMethodInterface
{
    public $companyName;
    public $inn;
    public $edrpou;

    public function __construct($companyName, $inn, $edrpou)
    {
        $this->companyName = $companyName;
        $this->inn = $inn;
        $this->edrpou = $edrpou;
    }

    public function isValid(): bool
    {
        return ! empty($this->companyName) && ! empty($this->inn) && ! empty($this->edrpou);
    }

    public function getPaymentData(): array
    {
        return [
            'name' => 'BANK'
        ];
    }
}
