<?php

use Psr\Container\ContainerInterface;
use SmartHawk\components\infrastructure\httpClient\HttpClient;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientInterface;

return [
    HttpClientInterface::class => function(ContainerInterface $container) {
        return new HttpClient;
    },
];