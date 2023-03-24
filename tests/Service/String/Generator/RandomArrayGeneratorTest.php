<?php

namespace App\Tests\Service\String\Generator;

use App\Service\String\Generator\RandomArrayGenerator;
use App\Service\String\Generator\RandomStringGenerator;
use PHPUnit\Framework\TestCase;

class RandomArrayGeneratorTest extends TestCase
{
    public function testAllAreStrings(): void
    {
        $randomArrayGenerator = new RandomArrayGenerator(new RandomStringGenerator(5));

        $array = $randomArrayGenerator->get();
        foreach ($array as $value) {
            $this->assertIsString($value);
        }
    }
}
