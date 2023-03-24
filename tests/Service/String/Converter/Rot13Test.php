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
            Rot13::get('NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm')
        );
    }

    public function testDuobleConverstion(): void
    {
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            Rot13::get(Rot13::get('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'))
        );
    }

    public function testNumbersDontBreak(): void
    {
        $this->assertEquals('123', Rot13::get('123'));
    }

    public function testArray(): void
    {
        $this->assertEquals(['123','123'], Rot13::get(['123', '123']));
        $this->assertEquals(['ABC','ABC'], Rot13::get(['NOP', 'NOP']));
    }
}