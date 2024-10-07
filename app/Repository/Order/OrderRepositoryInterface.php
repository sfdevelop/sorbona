<?php

namespace App\Repository\Order;

interface OrderRepositoryInterface
{
    public function updateStatusPaymentOnSuccess(int $order_id): bool|int;
}
