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
     * Converts a string to rot13 string
     *
     * @param string $string string to be converted
     * 
     * @return string
     */
    public function convert(string $string): string
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