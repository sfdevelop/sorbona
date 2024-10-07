<?php

return [
    'DEFAULT_LANG' => config('app.locale'),
    'NAME_PROJECT' => config('app.name'),
    'URL_PROJECT' => env('APP_URL'),
    'APP_DEFAULT_ENV' => env('APP_ENV'),
    'LANG_NOTIFICATION' => 'ru',
    'LOCALES' => config('translatable.locales'),
    'SCOUT_URL' => env('MEILISEARCH_HOST'),
    'CHAT_GPT_KEY' => env('OPEN_AI_KEY'),
];
