<?php

namespace App\Patterns\Builder\OrderFromPay;

use App\Models\Order;
use Illuminate\Support\Collection;

class OrderFromPayBuilder
{
    protected Order $order;

    protected Collection $resultCollection;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->resultCollection = collect();
    }

    public function getTotal(): OrderFromPayBuilder
    {
        $this->resultCollection->put('total', $this->order->total ?? null);

        return $this;
    }

    public function getOrderId(): OrderFromPayBuilder
    {
        $this->resultCollection->put('id', $this->order->id ?? null);

        return $this;
    }

    public function getDescription(): OrderFromPayBuilder
    {
        $this->resultCollection->put('description', 'Оплата (№: '.$this->order->id.') на сайті '.config('sfdevelop.site_name'));

        return $this;
    }

    public function getResultUrl(): OrderFromPayBuilder
    {
        $this->resultCollection->put('result_url', 'public.liqpay.result');

        return $this;
    }

    public function getResultCollection(): Collection
    {
        return $this->resultCollection;
    }
}
