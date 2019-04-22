<?php

use \FastRoute\RouteCollector;
use \DI\Container;

/** @var Container $container */
$container = require __DIR__ . '/src/app/config/bootstrap.php';

/** @var \FastRoute\Dispatcher $dispatcher */
$dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['SmartHawk\controllers\HomeController', 'home']);
    $r->addRoute('POST', '/', ['SmartHawk\controllers\HomeController', 'send']);
});

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];

        $parameters = [];
        if (!empty($_REQUEST['limitTo'])) {
            $parameters['limitTo'] = $_REQUEST['limitTo'];
        }
        if (!empty($_REQUEST['email'])) {
            $parameters['email'] = $_REQUEST['email'];
        }

        $container->call($controller, $parameters);
        break;
}