<?php

namespace App\Tests\Service\String\Generator;

use App\Service\String\Generator\RandomStringGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringGeneratorTest extends TestCase
{
    public function testIsString(): void
    {
        $randomStringGenerator = new RandomStringGenerator(4);
        $this->assertIsString($randomStringGenerator->get());
    }

    public function testStringLength(): void
    {
        $randomStringGenerator = new RandomStringGenerator(5);
        $this->assertEquals(5, strlen($randomStringGenerator->get()));
    }
}
