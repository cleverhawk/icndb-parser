<?php

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
];

foreach ($sources as $source) {
    $services = array_replace($services, require($source));
}

return $services;