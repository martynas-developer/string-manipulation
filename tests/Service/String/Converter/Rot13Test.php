<?php

namespace App\Tests\Service\String\Converter;

use App\Service\String\Converter\Rot13Converter;
use PHPUnit\Framework\TestCase;

class Rot13Test extends TestCase
{
    public function testCorrectConvertion(): void
    {
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            Rot13Converter::convert('NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm')
        );
    }

    public function testDuobleConverstion(): void
    {
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            Rot13Converter::convert(Rot13Converter::convert('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'))
        );
    }

    public function testNumbersDontBreak(): void
    {
        $this->assertEquals('123', Rot13Converter::convert('123'));
    }

    public function testArray(): void
    {
        $this->assertEquals(['123','123'], Rot13Converter::convert(['123', '123']));
        $this->assertEquals(['ABC','ABC'], Rot13Converter::convert(['NOP', 'NOP']));
    }
}