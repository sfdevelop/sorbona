<?php

namespace App\Repository\Order;

use App\Enum\StatusPaymentEnum;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @param  int  $order_id
     * @return bool|int
     */
    public function updateStatusPaymentOnSuccess(int $order_id): bool|int
    {
        return Order::query()->whereUuid($order_id)->update([
            'statusPay' => StatusPaymentEnum::SUCCESS,
        ]);
    }
}
