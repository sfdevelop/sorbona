<?php

namespace App\DeliveryMetods;

class UkrPochta implements DeliveryMethodInterface
{
    protected string $region;

    protected string $locality;

    protected string $index;

    public function __construct($region, $locality, $index)
    {
        $this->region = $region;
        $this->locality = $locality;
        $this->index = $index;
    }

    public function isValid(): bool
    {
        return ! empty($this->region) && ! empty($this->locality) && ! empty($this->index);
    }

    public function getDeliveryData(): array
    {
        return [
            'region' => $this->region,
            'city' => $this->locality,
            'address' => $this->index,
        ];
    }
}
