<?php

namespace App\Services\PaymentOrder;

use App\Models\Order;
use App\Payment\LiqPayPayment;
use Illuminate\Contracts\Container\BindingResolutionException;

class PaymentOrder implements PaymentOrderInterface
{
    /**
     * @param  string  $payment
     * @param  Order  $order
     *
     * @return string|null
     * @throws BindingResolutionException
     */
    public function payment(string $payment, Order $order): ?string
    {
        if ($order->payment == 'paymentMethodCard') {
          return  app()
                ->make(LiqPayPayment::class)
                ->LiqPayPaymentClass(order: $order);
        }

        return null;
    }
}
