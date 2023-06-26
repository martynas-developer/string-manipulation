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

namespace App\Service\String\Generator;

/**
 * Random string generator
 *
 * @category Class
 * @package  Stringmanipulation
 * @author   Martynas Dapkus <martynasdapkus94@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class RandomStringGenerator
{
    /**
     * Create a new random string generator of fixed length
     *
     * @param int $length length of random String
     */
    public function __construct(
        private readonly int $length
    ) {
        if ($this->length <= 0) {
            throw new \LogicException($this->length . ' must be greater than 0');
        }
    }

    /**
     * Generates a random string
     *
     * @return string
     * @throws \Exception
     */
    public function generate(): string
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $generatedString = '';
        $maxIndex = strlen($pool) - 1;
        for ($i = 0; $i < $this->length; $i++) {
            $generatedString .= $pool[random_int(0, $maxIndex)];
        }
        return $generatedString;
    }
}