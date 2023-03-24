<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Service\String\Converter\Rot13;
use App\Service\String\Converter\StringToNumberStringConverter;
use App\Service\String\Generator\RandomArrayGenerator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Service\String\Generator\RandomStringGenerator;
use Symfony\Component\DependencyInjection\Reference;

$containerBuilder = new ContainerBuilder();
$containerBuilder->setParameter('string.length', 10);
$containerBuilder
    ->register('string.generator.random_string_generator', RandomStringGenerator::class)
    ->addArgument('%string.length%');

$containerBuilder
    ->register('string.generator.random_array_generator', RandomArrayGenerator::class)
    ->addArgument(new Reference('string.generator.random_string_generator'));

$containerBuilder->register('string.converter.string_to_number_string_converter', StringToNumberStringConverter::class);
$containerBuilder->register('string.converter.rot13_converter', Rot13::class);

$converterPool = [
    $containerBuilder->get('string.converter.string_to_number_string_converter'),
    $containerBuilder->get('string.converter.rot13_converter')
];

$generatorPool = [
    $containerBuilder->get('string.generator.random_string_generator'),
    $containerBuilder->get('string.generator.random_array_generator'),
    $containerBuilder->get('string.generator.random_string_generator'),
    $containerBuilder->get('string.generator.random_array_generator'),
];

foreach ($generatorPool as $generator) {
    $randomConverter = $converterPool[random_int(0, count($converterPool) - 1)];
    $randomStrings = $generator->get();
    echo json_encode($randomStrings)
        . ' -> ' . get_class($randomConverter)
        . ' -> ' . json_encode($randomConverter->get($randomStrings)) . PHP_EOL;
}