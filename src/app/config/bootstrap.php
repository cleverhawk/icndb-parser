<?php

use DI\ContainerBuilder;

require_once __DIR__ . '/../../../vendor/autoload.php';

return call_user_func(function() {
    $params = require __DIR__ . '/params.php';

    $containerBuilder = new ContainerBuilder;
    $containerBuilder->addDefinitions($params);
    $containerBuilder->addDefinitions(__DIR__ . '/di/services.php');
    $containerBuilder->addDefinitions(__DIR__ . '/di/controllers.php');

    $containerBuilder->useAutowiring(false);
    $containerBuilder->useAnnotations(false);

    $container = $containerBuilder->build();

    ini_set('display_errors', true);
    error_reporting(E_ALL);

    return $container;
});
