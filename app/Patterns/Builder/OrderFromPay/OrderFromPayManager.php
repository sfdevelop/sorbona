<?php

namespace App\Patterns\Builder\OrderFromPay;

use App\Models\Order;
use Illuminate\Support\Collection;

class OrderFromPayManager
{
    public function __construct(public Order $order) {}

    /**
     * @return Collection
     */
    public function dataFromPayToLiqPay(): Collection
    {
        return (new OrderFromPayBuilder($this->order))
            ->getTotal()
            ->getOrderId()
            ->getDescription()
            ->getResultUrl()
            ->getResultCollection();
    }
}
