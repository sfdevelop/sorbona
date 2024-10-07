<?php

namespace App\Patterns\Strategy\OrderItems;

interface ConversionStrategy
{
    public function convert($data): array;
}
