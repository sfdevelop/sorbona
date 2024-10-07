<?php

namespace App\Services\Translate;

interface TranslateServiceInterface
{
    public function getTranslateText($text, $lang, $startLang);
}
