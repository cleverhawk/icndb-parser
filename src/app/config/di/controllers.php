<?php

use Psr\Container\ContainerInterface;
use SmartHawk\controllers\HomeController;
use SmartHawk\services\PagesService;

return [
    HomeController::class => function(ContainerInterface $container) {
        $controller = new HomeController(
            $container->get(\Twig_Environment::class),
            $container->get(PagesService::class)
        );
        return $controller;
    },
];