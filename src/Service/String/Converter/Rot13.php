<?php

namespace App\Service\String\Converter;

class Rot13 implements Converter
{
    public static function get(string|array $strings): string|array
    {
        $isArray = true;
        if (!is_array($strings)) {
            $strings = [$strings];
            $isArray = false;
        }

        $convertedStrings = [];
        foreach ($strings as $string) {
            $convertedStrings[] = self::convert($string);
        }

        return $isArray ? $convertedStrings : $convertedStrings[0];
    }

    private static function convert(string $string): string
    {
        $inputSymbol = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $outputSymbol = 'NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm';
        $convertedString = '';
        foreach (mb_str_split($string) as $symbol) {
            $index = strpos($inputSymbol, $symbol);
            $convertedString .= $index !== false ? $outputSymbol[$index] : $symbol;
        }
        return $convertedString;
    }
}