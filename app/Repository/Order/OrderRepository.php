<?php

namespace App\Repository\Order;

use App\Enum\StatusPaymentEnum;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @param  string  $order_id
     *
     * @return bool|int
     */
    public function updateStatusPaymentOnSuccess(string $uuid): bool|int
    {
        return Order::query()->whereUuid($uuid)->first()->update([
            'statusPay' => StatusPaymentEnum::SUCCESS,
        ]);
    }
}
