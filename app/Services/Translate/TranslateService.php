<?php

namespace App\Services\Translate;

use Stichoza\GoogleTranslate\Exceptions\LargeTextException;
use Stichoza\GoogleTranslate\Exceptions\RateLimitException;
use Stichoza\GoogleTranslate\Exceptions\TranslationRequestException;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateService implements TranslateServiceInterface
{
    /**
     * @param  $text
     * @param  $lang
     * @param  string  $startLang
     * @return string
     *
     * @throws LargeTextException
     * @throws RateLimitException
     * @throws TranslationRequestException
     */
    public function getTranslateText($text, $lang, $startLang = 'uk')
    {
        if ($text) {
            return GoogleTranslate::trans($text, $lang, $startLang) ?? $text;
        }

        return null;
    }
}
