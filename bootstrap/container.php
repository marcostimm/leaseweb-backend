<?php declare(strict_types=1);

use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . DIRECTORY_SEPARATOR . 'services.php');

return $containerBuilder->build();