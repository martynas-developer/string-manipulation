<?php

namespace App\Service\String\Converter;

interface Converter
{

    /**
     * @param string|string[] $strings
     * @return string|string[]
     */
    public static function get(string|array $strings): string|array;
}