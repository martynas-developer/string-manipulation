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
 * Generates an array of random strings
 *
 * @category Class
 * @package  Stringmanipulation
 * @author   Martynas Dapkus <martynasdapkus94@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class RandomArrayOfStringsGenerator
{
    private RandomStringGenerator $_randomStringGenerator;

    /**
     * Create a generator of random strings
     *
     * @param int $stringLength length of each string
     * @param int $arrayLength  number of elements in array
     */
    public function __construct(
        readonly int $stringLength,
        private readonly int $arrayLength
    ) {
        if ($this->stringLength <= 0) {
            throw new \LogicException(
                $this->stringLength . ' must be greater than 0'
            );
        }
        if ($this->arrayLength <= 0) {
            throw new \LogicException(
                $this->arrayLength . ' must be greater than 0'
            );
        }
        $this->_randomStringGenerator = new RandomStringGenerator($stringLength);
    }

    /**
     * Generates an array of random strings
     *
     * @return string[]
     */
    public function generate(): array
    {
        $array = [];
        for ($i = 0; $i < $this->arrayLength; $i++) {
            $array[] = $this->_randomStringGenerator->generate();
        }
        return $array;
    }
}