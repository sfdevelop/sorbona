<?php

namespace App\Enum;

enum StatusPaymentEnum: string
{
    case SUCCESS = 'Оплачено';
    case NO_SUCCESS = 'Не оплачено';
}
