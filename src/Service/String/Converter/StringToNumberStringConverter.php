<?php

/**
 * PHP version 8.2
 *
 * @category Class
 * @package  Stringmanipulation
 * @author   Martynas Dapkus <martynasdapkus94@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace App\Service\String\Converter;

/**
 * Converts a string by a following pattern Input: 22aAcd Output: 22/1/1/3/4
 *
 * @category Class
 * @package  Stringmanipulation
 * @author   Martynas Dapkus <martynasdapkus94@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class StringToNumberStringConverter implements Converter
{
    /**
     * Converts string according to a pattern
     *
     * @param string $string string to be converted
     *
     * @return string
     */
    public function convert(string $string): string
    {
        $separator = '/';
        $array = preg_split(
            '/([0-9]+|[a-zA-Z])/',
            $string,
            flags: PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
        ) ?: [];
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

    /**
     * Convert array of strings
     *
     * @param string[] $strings strings to be converted
     *
     * @return string[]
     */
    public function convertArray(array $strings): array
    {
        $convertedStrings = [];
        foreach ($strings as $string) {
            $convertedStrings[] = $this->convert($string);
        }
        return $convertedStrings;
    }
}