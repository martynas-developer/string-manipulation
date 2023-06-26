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
require_once __DIR__ . '/../vendor/autoload.php';

use App\Service\String\Converter\Converter;
use App\Service\String\Converter\Rot13Converter;
use App\Service\String\Converter\StringToNumberStringConverter;
use App\Service\String\Generator\RandomArrayOfStringsGenerator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Service\String\Generator\RandomStringGenerator;

// Container setup
$containerBuilder = new ContainerBuilder();
$containerBuilder->setParameter('string.length', 10);
$containerBuilder->setParameter('array.length', 10);
$containerBuilder
    ->register(RandomStringGenerator::class, RandomStringGenerator::class)
    ->addArgument('%string.length%');

$containerBuilder
    ->register(
        RandomArrayOfStringsGenerator::class,
        RandomArrayOfStringsGenerator::class
    )
    ->addArgument('%array.length%')
    ->addArgument('%string.length%');

$containerBuilder->register(
    StringToNumberStringConverter::class,
    StringToNumberStringConverter::class
);
$containerBuilder->register(Rot13Converter::class, Rot13Converter::class);

$generatorPool = [
    $containerBuilder->get(RandomStringGenerator::class),
    $containerBuilder->get(RandomArrayOfStringsGenerator::class),
];
// End Of container setup

foreach ($generatorPool as $generator) {
    /**
     * Generator variable
     *
     * @var RandomStringGenerator|RandomArrayOfStringsGenerator $generator
    */
    $randomConverter = getRandomConverter();
    $randomStrings = $generator->generate();
    echo json_encode($randomStrings)
        . ' -> ' . get_class($randomConverter)
        . ' -> ' . json_encode($randomConverter->convert($randomStrings)) . PHP_EOL;
}

/**
 * Retrieve a random converter form converter pool
 *
 * @return Converter
 *
 * @throws Exception
 */
function getRandomConverter(): Converter
{
    global $containerBuilder;
    $converterPool = [
        $containerBuilder->get(StringToNumberStringConverter::class),
        $containerBuilder->get(Rot13Converter::class)
    ];
    return $converterPool[random_int(0, count($converterPool) - 1)];
}