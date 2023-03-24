<?php

namespace App\Service\String\Converter;

class Rot13 implements Converter
{
    public static function convert(string $string): string
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