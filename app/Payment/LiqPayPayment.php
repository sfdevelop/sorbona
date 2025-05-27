<?php

namespace App\Payment;

use App\Models\Order;
use App\Services\LiqPay\LiqPaySDK;

class LiqPayPayment implements LiqPayPaymentInterface
{
    /**
     * @param  Order  $order
     * @return string
     */
    public function LiqPayPaymentClass(Order $order): string
    {
        $liq_pay = new LiqPaySDK(config('sfdevelop.LIQPAY_PUBLIC_KEY'), config('sfdevelop.LIQPAY_PRIVATE_KEY'));

        $site = config('sfdevelop.site_name');

        $cnb_data = [
            'action' => 'pay',
            'amount' => $order->total,
            'currency' => 'UAH',
            'description' => "Оплата (№: $order->id на сайті $site)",
            'order_id' => $order->uuid,
            'version' => '3',
            'language' => app()->getLocale(),
            'result_url' => route('public.liqpay.result').'/',
        ];

        $pay_params = $liq_pay->cnb_data($cnb_data);

        return "{$liq_pay->get_checkout_url()}?data={$pay_params->data}&signature={$pay_params->signature}";
    }
}
