<?php

namespace App\DeliveryMetods;

use App\Models\NovaPochta\NovaPochtaCity;
use App\Models\NovaPochta\NovaPochtaDepot;

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
            'city' => NovaPochtaCity::where('ref', $this->selectedCity)->first()->name,
            'address' => NovaPochtaDepot::where('ref', $this->selectedAddress)->first()->name,
        ];
    }
}
