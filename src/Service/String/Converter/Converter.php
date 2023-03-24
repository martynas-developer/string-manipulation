<?php

namespace App\Service\String\Converter;

interface Converter
{
    public static function convert(string $string): string;
}