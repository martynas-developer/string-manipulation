<?php

namespace App\Tests\Service\String\Generator;

use App\Service\String\Generator\RandomArrayOfStringsGenerator;
use PHPUnit\Framework\TestCase;

class RandomArrayGeneratorTest extends TestCase
{
    public function testAllAreStrings(): void
    {
        $randomArrayGenerator = new RandomArrayOfStringsGenerator(5, 5);

        $array = $randomArrayGenerator->generate();
        foreach ($array as $value) {
            $this->assertIsString($value);
        }
    }
}
