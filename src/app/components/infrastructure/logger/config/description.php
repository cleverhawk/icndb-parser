<?php

use Psr\Container\ContainerInterface;
use SmartHawk\components\infrastructure\logger\Logger;
use SmartHawk\components\interfaces\infrastructure\logger\LoggerInterface;

return [
    LoggerInterface::class => function(ContainerInterface $container) {
        return new Logger($container->get('log_file_path'));
    },
];