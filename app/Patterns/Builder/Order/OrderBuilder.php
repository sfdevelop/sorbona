<?php

namespace App\Patterns\Builder\Order;

use App\Models\Order;

class OrderBuilder
{
    private array $orderData = [];

    public function setName(string $name): self
    {
        $this->orderData['name'] = $name;

        return $this;
    }

    public function setUserId(): self
    {
        $this->orderData['user_id'] = (\Auth::check() ? \Auth::user()->id : null);

        return $this;
    }

    public function setComment(string $comment): self
    {
        $this->orderData['comment'] = $comment;

        return $this;
    }

    public function setPhone(string $phone): self
    {
        $this->orderData['phone'] = $phone;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->orderData['email'] = $email;

        return $this;
    }

    public function setTotal(int|float $total): self
    {
        $this->orderData['total'] = $total;

        return $this;
    }

    public function setPayment(string $payment): self
    {
        $this->orderData['payment'] = $payment;

        return $this;
    }

    public function setDelivery(array $delivery): self
    {
        $this->orderData['delivery'] = $delivery;

        return $this;
    }

    public function setDeliveryTitle(string $deliveryTitle): self
    {
        $this->orderData['deliveryTitle'] = $deliveryTitle;

        return $this;
    }

    public function create(): Order
    {
        return Order::create($this->orderData);
    }
}
