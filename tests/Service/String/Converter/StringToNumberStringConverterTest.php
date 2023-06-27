<?php

namespace App\Tests\Service\String\Converter;

use App\Service\String\Converter\StringToNumberStringConverter;
use PHPUnit\Framework\TestCase;

class StringToNumberStringConverterTest extends TestCase
{
    private StringToNumberStringConverter|null $stringToNumberStringConverter;

    protected function setUp(): void
    {
        $this->stringToNumberStringConverter = new StringToNumberStringConverter();
    }

    protected function tearDown(): void
    {
        $this->stringToNumberStringConverter = null;
    }

    public function testCorrectConversion(): void
    {
        $this->assertEquals('121', $this->stringToNumberStringConverter->convert(121));
        $this->assertEquals('123/1/2/3', $this->stringToNumberStringConverter->convert('123abc'));
        $this->assertEquals('1/1/1/1/1', $this->stringToNumberStringConverter->convert('a1a1a'));
        $this->assertEquals('1/1/2/2', $this->stringToNumberStringConverter->convert('aABb'));
    }

    public function testCorrectArrayConversion(): void
    {
        $this->assertEquals(['121'], $this->stringToNumberStringConverter->convertArray(['121']));
        $this->assertEquals(['123/1/2/3', '123/1/2/3'], $this->stringToNumberStringConverter->convertArray(['123abc', '123abc']));
    }
}