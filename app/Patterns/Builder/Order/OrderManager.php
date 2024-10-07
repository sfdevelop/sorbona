<?php

namespace App\Patterns\Builder\Order;

use App\Models\Order;

class OrderManager
{
    public function __construct(
        public array $data,
        public int|float $total,
        protected string $payment,
        protected string $delivery,
        protected array $deliveryData,
    ) {}

    /**
     * @return Order
     */
    public function userOrder(): Order
    {
        return (new OrderBuilder)
            ->setName($this->data['name'])
            ->setComment($this->data['comment'])
            ->setPhone($this->data['phone'])
            ->setEmail($this->data['email'])
            ->setDeliveryTitle($this->delivery)
            ->setTotal($this->total)
            ->setPayment($this->payment)
            ->setDelivery($this->deliveryData)
            ->setUserId()
            ->create();
    }
}
