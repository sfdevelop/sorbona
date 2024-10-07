<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class shortDescriptionHelperTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        require_once __DIR__.'/../../app/Helpers/helpers.php';
    }

    /**
     * A basic unit test example.
     */
    public function test_short_description_returns_original_string_when_input_is_shorter_than_count()
    {
        $input = 'This is a short string.';
        $result = shortDescription($input, 50);
        $this->assertEquals($input, $result);
    }

    public function test_short_description_truncates_string_with_ellipsis_when_input_is_longer_than_count()
    {
        $input = 'This is a very long string that should be truncated.';
        $result = shortDescription($input, 5);
        $this->assertEquals('This is a very long...', $result);
    }

    public function test_short_description_strips_html_tags_before_truncation()
    {
        $input = '<p>This is a <strong>very</strong> long string with <em>HTML</em> tags that should be truncated.</p>';
        $result = shortDescription($input, 5);
        $this->assertEquals('This is a very long...', $result);
    }

    public function test_short_description_decodes_html_entities_in_final_string()
    {
        $input = 'This &amp; that';
        $result = shortDescription($input, 50);
        $this->assertEquals('This & that', $result);
    }

    public function test_short_description_handles_exact_count_without_truncation()
    {
        $input = 'This is exactly five words.';
        $result = shortDescription($input, 5);
        $this->assertEquals($input, $result);
    }

    public function test_short_description_handles_empty_input_string()
    {
        $input = '';
        $result = shortDescription($input, 50);
        $this->assertEquals('', $result);
    }

    public function test_short_description_handles_non_ascii_characters()
    {
        $input = 'Това е много дълъг низ с не-ASCII символи, които трябва да бъдат съкратени.';
        $result = shortDescription($input, 5);
        $this->assertEquals('Това е много дълъг низ...', $result);
    }

    public function test_short_description_handles_negative_count_value()
    {
        $input = 'This is a test string.';
        $result = shortDescription($input, -5);
        $this->assertEquals('', $result);
    }
}
