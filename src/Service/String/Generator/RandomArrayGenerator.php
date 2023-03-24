<?php

namespace App\Service\String\Generator;

class RandomArrayGenerator
{
    public function __construct(
        private readonly RandomStringGenerator $randomStringGenerator
    ) {}

    /**
     * @return string[]
     */
    public function get(): array
    {
        $length = random_int(1, 20);
        $array = [];
        for ($i = 0; $i < $length; $i++) {
            $array[] = $this->randomStringGenerator->get();
        }
        return $array;
    }
}