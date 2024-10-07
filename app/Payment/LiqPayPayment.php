<?php

namespace App\Payment;

use App\Services\LiqPay\LiqPaySDK;

class LiqPayPayment implements LiqPayPaymentInterface
{
    /**
     * @param  $order
     * @return string
     */
    public function LiqPayPaymentClass($order): string
    {
        $liq_pay = new LiqPaySDK(config('sfdevelop.LIQPAY_PUBLIC_KEY'), config('sfdevelop.LIQPAY_PRIVATE_KEY'));

        $cnb_data = [
            'action' => 'pay',
            'amount' => $order['total'],
            'currency' => 'UAH',
            'description' => $order['description'],
            'order_id' => $order['id'],
            'version' => '3',
            'language' => app()->getLocale(),
            'result_url' => route($order['result_url']).'/',
        ];

        $pay_params = $liq_pay->cnb_data($cnb_data);

        return "{$liq_pay->get_checkout_url()}?data={$pay_params->data}&signature={$pay_params->signature}";
    }
}
