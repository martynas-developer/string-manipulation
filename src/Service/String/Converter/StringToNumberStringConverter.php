<?php

namespace App\Service\String\Converter;

class StringToNumberStringConverter implements Converter
{
    public static function convert(string $string): string
    {
        $separator = '/';
        $array = preg_split('/([0-9]+|[a-zA-Z])/', $string, flags: PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        foreach ($array as $key => $value) {
            if (is_int($value)) {
                $array[$key] = $value;
            } else if (ctype_alpha($value)) {
                $index = ord(strtolower($value));
                $array[$key] =  $index - 96;
            }
        }
        return implode($separator, $array);
    }
}