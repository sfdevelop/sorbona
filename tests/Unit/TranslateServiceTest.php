<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TranslateServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_get_translate_text_returns_null_for_empty_input()
    {
        $translateService = new \App\Services\Translate\TranslateService;
        $result = $translateService->getTranslateText('', 'en');
        $this->assertNull($result);
    }

    public function test_get_translate_text_returns_null_for_null_input()
    {
        $translateService = new \App\Services\Translate\TranslateService;
        $result = $translateService->getTranslateText(null, 'en');
        $this->assertNull($result);
    }

    public function test_get_translate_text_translates_correctly_from_uk_to_en()
    {
        $translateService = new \App\Services\Translate\TranslateService;
        $result = $translateService->getTranslateText('Привіт світ',
            'en');

        $this->assertEquals('hello world', $result);
    }

    public function test_get_translate_text_handles_different_start_language()
    {
        $translateService = new \App\Services\Translate\TranslateService;
        $result = $translateService->getTranslateText('Hola mundo',
            'en', 'es');

        $this->assertEquals('Hello world', $result);
    }

    public function test_get_translate_text_handles_text_with_numbers()
    {
        $translateService = new \App\Services\Translate\TranslateService;
        $input = 'Hello world 123';
        $result = $translateService->getTranslateText($input, 'es', 'en');
        $this->assertEquals('Hola mundo 123', $result);
    }

    public function test_get_translate_text_handles_long_string()
    {
        $translateService = new \App\Services\Translate\TranslateService;
        $longText = str_repeat('Hello world ', 1000); // Creating a long string by repeating 'Hello world '
        $result = $translateService->getTranslateText($longText, 'es', 'en');
        $this->assertNotNull($result); // Ensure that the result is not null
        $this->assertNotEquals($longText, $result); // Ensure that the text has been translated
    }
}
