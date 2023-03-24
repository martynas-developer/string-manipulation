<?php

namespace App\Tests\Service\String\Converter;

use App\Service\String\Converter\Rot13;
use PHPUnit\Framework\TestCase;

class Rot13Test extends TestCase
{
    public function testCorrectConvertion(): void
    {
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            Rot13::convert('NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm')
        );
    }

    public function testDuobleConverstion(): void
    {
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            Rot13::convert(Rot13::convert('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'))
        );
    }

    public function testNumbersDontBreak(): void
    {
        $this->assertEquals('123', Rot13::convert('123'));
    }
}