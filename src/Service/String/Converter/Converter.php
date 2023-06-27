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
 * Converts a string to another string
 *
 * @category Class
 * @package  Stringmanipulation
 * @author   Martynas Dapkus <martynasdapkus94@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
interface Converter
{

    /**
     * Function to convert string to another string
     *
     * @param string $string string to be converted
     *
     * @return string
     */
    public function convert(string $string): string;

    /**
     * Function to convert strings to another strings
     *
     * @param string[] $strings array of strings to be converted
     *
     * @return string[]
     */
    public function convertArray(array $strings): array;
}