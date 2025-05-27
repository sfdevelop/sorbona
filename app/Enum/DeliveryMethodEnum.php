<?php

namespace App\Enum;

enum DeliveryMethodEnum: string
{
    case LOCAL = 'deliveryMethodLocal';
    case NOVA_POCHTA = 'deliveryMethodNp';
    case UKR_POCHTA = 'deliveryMethodUp';

    public function getLabel(): string
    {
        return match ($this) {
            self::LOCAL => __('checkout.delivery_method_local'),
            self::NOVA_POCHTA => __('checkout.delivery_method_np'),
            self::UKR_POCHTA => __('checkout.delivery_method_up'),
        };
    }
}
