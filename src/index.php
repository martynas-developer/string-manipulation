<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Service\String\Converter\Rot13;
use App\Service\String\Converter\StringToNumberStringConverter;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Service\String\Generator\RandomStringGenerator;

$containerBuilder = new ContainerBuilder();
$containerBuilder->setParameter('string.length', 10);
$containerBuilder
    ->register('string.generator.random_string_generator', RandomStringGenerator::class)
    ->addArgument('%string.length%');

$containerBuilder->register('string.converter.string_to_number_string_converter', StringToNumberStringConverter::class);
$containerBuilder->register('string.converter.rot13_converter', Rot13::class);

$converterPool = [
    $containerBuilder->get('string.converter.string_to_number_string_converter'),
    $containerBuilder->get('string.converter.rot13_converter')
];

$randomStrings = $containerBuilder->get('string.generator.random_string_generator')->generateArray(random_int(1, 100));

foreach ($randomStrings as $randomString) {
    $randomConverter = $converterPool[random_int(0, count($converterPool) - 1)];
    echo $randomString . ' -> ' . get_class($randomConverter) . ' -> ' . $randomConverter->convert($randomString) . PHP_EOL;
}