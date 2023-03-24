<?php

namespace App\Tests\Service\String\Converter;

use App\Service\String\Converter\StringToNumberStringConverter;
use PHPUnit\Framework\TestCase;

class StringToNumberStringConverterTest extends TestCase
{
    public function testCorrectConvertion(): void
    {
        $this->assertEquals('121', StringToNumberStringConverter::convert(121));
        $this->assertEquals('123/1/2/3', StringToNumberStringConverter::convert('123abc'));
        $this->assertEquals('1/1/1/1/1', StringToNumberStringConverter::convert('a1a1a'));
    }
}