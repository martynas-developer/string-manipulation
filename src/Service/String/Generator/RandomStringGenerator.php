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

    public function generate(): string
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyz';
        $generatedString = '';
        $maxIndex = strlen($pool) - 1;
        for ($i = 0; $i < $this->length; $i++) {
            $generatedString .= $pool[random_int(0, $maxIndex)];
        }
        return $generatedString;
    }

    /**
     * @return string[]
     */
    public function generateArray(int $count): array
    {
        if ($count <= 0) {
            throw new \LogicException($count . ' must be greater than 0');
        }
        $array = [];
        for ($i = 0; $i < $count; $i++) {
            $array[] = $this->generate();
        }
        return $array;
    }
}