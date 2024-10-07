<?php

namespace App\DeliveryMetods;

class NovaPochta implements DeliveryMethodInterface
{
    protected string $selectedRegion;

    protected string $selectedCity;

    protected string $selectedAddress;

    public function __construct($selectedRegion, $selectedCity, $selectedAddress)
    {
        $this->selectedRegion = $selectedRegion;
        $this->selectedCity = $selectedCity;
        $this->selectedAddress = $selectedAddress;
    }

    public function isValid(): bool
    {
        return ! empty($this->selectedRegion) && ! empty($this->selectedCity) && ! empty($this->selectedAddress);
    }

    public function getDeliveryData(): array
    {
        return [
            'region' => $this->selectedRegion,
            'city' => $this->selectedCity,
            'address' => $this->selectedAddress,
        ];
    }
}
