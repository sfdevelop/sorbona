<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default option
    |--------------------------------------------------------------------------
    | APP_PART - local or production
    */

    'NAME_PROJECT' => env('APP_NAME'),
    'URL_PROJECT' => env('APP_URL'),

    'APP_PART' => env('APP_ENV'),
    'API_NOVA_POCHTA_KEY' => env('NOVA_POCHTA_API_KEY'),
];
