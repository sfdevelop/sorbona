<?php

namespace App\DeliveryMetods;

class Local implements DeliveryMethodInterface
{
    public $address = '';
    public function __construct($address)
    {
        $this->address = $address;
    }

    public function isValid(): bool
    {
        return ! empty($this->address);
    }

    public function getDeliveryData(): array
    {
        return [
            'region' => '',
            'city' => '',
            'address' => $this->address,
        ];
    }
}
