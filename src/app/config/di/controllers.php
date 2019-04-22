<?php

use Psr\Container\ContainerInterface;
use SmartHawk\controllers\HomeController;

return [
    HomeController::class => function(ContainerInterface $container) {
        $controller = new HomeController($container->get(\Twig_Environment::class));
        return $controller;
    },
];