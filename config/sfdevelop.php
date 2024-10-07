<?php

/** @noinspection ALL */

return [

    /*
    |--------------------------------------------------------------------------
    | Общие настройки
    |--------------------------------------------------------------------------
    |
    | site_name - название сайта
    |
    */

    'site_name' => env('APP_NAME', 'Develop Site'),

    'site_url' => env('APP_URL', 'http://localhost'),

    'LANG_NOTIFICATION' => 'uk',

    'NAME_PROJECT' => config('app.name'),

    /*
    |--------------------------------------------------------------------------
    | LiqPay - настройки
    |--------------------------------------------------------------------------
    |
    | LIQPAY_PUBLIC_KEY  - публичный ключ Privat liqpay
    | LIQPAY_PRIVATE_KEY - публичный ключ Privat liqpay
    |
    */

    'LIQPAY_PUBLIC_KEY' => env('LIQPAY_PUBLIC_KEY'),

    'LIQPAY_PRIVATE_KEY' => env('LIQPAY_PRIVATE_KEY'),
];
