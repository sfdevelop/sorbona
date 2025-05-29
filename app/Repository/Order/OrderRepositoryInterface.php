<?php

namespace App\Repository\Order;

interface OrderRepositoryInterface
{
    public function updateStatusPaymentOnSuccess(string $uuid): bool|int;
}
