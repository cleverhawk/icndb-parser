<?php

namespace SmartHawk\services;

use SmartHawk\components\interfaces\application\parser\ParserInterface;
use SmartHawk\components\interfaces\infrastructure\logger\LoggerInterface;
use SmartHawk\components\interfaces\infrastructure\mailer\MailerInterface;

class PagesService
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * PagesService constructor.
     * @param ParserInterface $parser
     * @param LoggerInterface $logger
     * @param MailerInterface $mailer
     */
    public function __construct(ParserInterface $parser, LoggerInterface $logger, MailerInterface $mailer)
    {
        $this->parser = $parser;
        $this->logger = $logger;
        $this->mailer = $mailer;
    }

    public function getCategories(): array
    {
        return $this->parser->getCategories();
    }

    public function getJoke(?string $category = null): ?string
    {
        return $this->parser->getJoke($category);
    }

    public function send(string $joke, string $to, string $category)
    {
        $request = $this->mailer->createRequest();
        $request->setTo($to);
        $request->setSubject('Случайная шутка из ' . $category);
        $request->setBody($joke);

        return $this->mailer->send($request);
    }

    public function write(string $joke, string $to)
    {
        $message = 'Шутка: ' . $joke;
        $message .= ' [отправлено на email: ' . $to . ' в ' . date('H:i:s d.m.Y') . ']';

        return $this->logger->write($message);
    }
}