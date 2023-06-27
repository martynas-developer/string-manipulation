<?php

namespace App\Tests\Service\String\Converter;

use App\Service\String\Converter\Rot13Converter;
use PHPUnit\Framework\TestCase;

class Rot13Test extends TestCase
{
    private Rot13Converter|null $rot13Converter;

    protected function setUp(): void
    {
        $this->rot13Converter = new Rot13Converter();
    }

    protected function tearDown(): void
    {
        $this->rot13Converter = null;
    }

    public function testCorrectConversion(): void
    {

        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            $this->rot13Converter->convert('NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm')
        );
    }

    public function testDoubleConversion(): void
    {
        $this->assertEquals(
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            $this->rot13Converter->convert(
                $this->rot13Converter->convert(
                    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'
                )
            )
        );
    }

    public function testNumbersDontBreak(): void
    {
        $this->assertEquals('123', $this->rot13Converter->convert('123'));
    }

    public function testArray(): void
    {
        $this->assertEquals(['123','123'], $this->rot13Converter->convertArray(['123', '123']));
        $this->assertEquals(['ABC','ABC'], $this->rot13Converter->convertArray(['NOP', 'NOP']));
    }
}