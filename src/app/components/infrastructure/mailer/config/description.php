<?php

use Psr\Container\ContainerInterface;
use SmartHawk\components\infrastructure\mailer\Mailer;
use SmartHawk\components\interfaces\infrastructure\mailer\MailerInterface;

return [
    MailerInterface::class => function(ContainerInterface $container) {
        return new Mailer($container->get('default_sender_name'), $container->get('default_sender_email'));
    },
];