<?php

use Psr\Container\ContainerInterface;
use SmartHawk\components\application\parser\Parser;
use SmartHawk\components\interfaces\application\parser\ParserInterface;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientInterface;

return [
    ParserInterface::class => function(ContainerInterface $container) {
        return new Parser($container->get(HttpClientInterface::class), $container->get('api_url'));
    },
];