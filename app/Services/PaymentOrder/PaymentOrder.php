<?php

namespace App\Services\PaymentOrder;

use App\Models\Order;
use App\Patterns\Builder\OrderFromPay\OrderFromPayManager;
use LiqPayPaymentFacade;

class PaymentOrder implements PaymentOrderInterface
{
    /**
     * @param  string  $payment
     * @param  Order  $order
     * @return string|null
     */
    public function payment(string $payment, Order $order): ?string
    {
        if ($payment == 'LiqPay') {
            $payment = new OrderFromPayManager($order);
            $dataFromPay = $payment->dataFromPayToLiqPay();

            return LiqPayPaymentFacade::LiqPayPaymentClass($dataFromPay);

            //            return redirect()->to($redirectLink);
        }

        return null;
    }
}
