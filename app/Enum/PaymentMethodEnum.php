<?php

namespace App\Enum;

enum PaymentMethodEnum: string
{
    case METHOD_COD = 'paymentMethodCod';
    case METHOD_CARD = 'paymentMethodCard';
    case METHOD_BANK = 'paymentMethodBank';

    public function getLabel(): string
    {
        return match ($this) {
            self::METHOD_COD => __('checkout.payment_method_cod'),
            self::METHOD_CARD => __('checkout.payment_method_card'),
            self::METHOD_BANK => __('checkout.payment_method_bank'),

        };
    }
}
