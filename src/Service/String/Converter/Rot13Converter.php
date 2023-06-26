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
 * Rotates a string by 13 places
 *
 * @category Class
 * @package  Stringmanipulation
 * @author   Martynas Dapkus <martynasdapkus94@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class Rot13Converter implements Converter
{
    /**
     * Rotate a string or array of strings
     *
     * @param string|string[] $strings strings to be rotated
     * 
     * @return string|string[]
     */
    public static function convert(string|array $strings): string|array
    {
        $isArray = true;
        if (!is_array($strings)) {
            $strings = [$strings];
            $isArray = false;
        }

        $convertedStrings = [];
        foreach ($strings as $string) {
            $convertedStrings[] = self::_convertString($string);
        }

        return $isArray ? $convertedStrings : $convertedStrings[0];
    }

    /**
     * Converts a string to rot13 string
     *
     * @param string $string string to be converted
     *
     * @return string
     */
    private static function _convertString(string $string): string
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