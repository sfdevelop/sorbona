<?php

namespace App\Enum;

enum StatusPaymentEnum: string
{
    case SUCCESS = 'Оплачено';
    case NO_SUCCESS = 'Не оплачено';

    public function getLabel(): string
    {
        return match ($this) {
            self::SUCCESS => 'Оплачено',
            self::NO_SUCCESS => 'Не оплачено',
        };
    }

    public function getTextColor(): string
    {
        return match ($this) {
            self::SUCCESS => 'success',
            self::NO_SUCCESS => 'error',
        };
    }
}
