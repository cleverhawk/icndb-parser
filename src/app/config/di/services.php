<?php

use Psr\Container\ContainerInterface;
use SmartHawk\components\interfaces\application\parser\ParserInterface;
use SmartHawk\components\interfaces\infrastructure\logger\LoggerInterface;
use SmartHawk\components\interfaces\infrastructure\mailer\MailerInterface;
use SmartHawk\services\PagesService;

$sources = [
    __DIR__ . '/../../components/application/parser/config/description.php',
    __DIR__ . '/../../components/infrastructure/httpClient/config/description.php',
    __DIR__ . '/../../components/infrastructure/logger/config/description.php',
    __DIR__ . '/../../components/infrastructure/mailer/config/description.php',
];

$services = [
    \Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../views');
        return new \Twig_Environment($loader);
    },
    PagesService::class => function(ContainerInterface $container) {
        return new PagesService(
            $container->get(ParserInterface::class),
            $container->get(LoggerInterface::class),
            $container->get(MailerInterface::class)
        );
    },
];

foreach ($sources as $source) {
    $services = array_replace($services, require($source));
}

return $services;