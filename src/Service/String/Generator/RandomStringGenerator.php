<?php

namespace App\Service\String\Generator;

class RandomStringGenerator
{
    public function __construct(
        private readonly int $length
    ) {
        if ($this->length <= 0) {
            throw new \LogicException($this->length . ' must be greater than 0');
        }
    }

    public function get(): string
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyz';
        $generatedString = '';
        $maxIndex = strlen($pool) - 1;
        for ($i = 0; $i < $this->length; $i++) {
            $generatedString .= $pool[random_int(0, $maxIndex)];
        }
        return $generatedString;
    }
}