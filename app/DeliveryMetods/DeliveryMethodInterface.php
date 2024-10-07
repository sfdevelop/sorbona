<?php

namespace App\DeliveryMetods;

interface DeliveryMethodInterface
{
    public function isValid(): bool;

    public function getDeliveryData(): array;
}
