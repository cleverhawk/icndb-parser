<?php

namespace SmartHawk\components\infrastructure\mailer;

use SmartHawk\components\interfaces\infrastructure\mailer\MailerInterface;
use SmartHawk\components\interfaces\infrastructure\mailer\MailerRequestInterface;

class Mailer implements MailerInterface
{
    /** @var string */
    protected $from_name;

    /** @var string */
    protected $from_email;

    /**
     * Mailer constructor.
     * @param string $from_name
     * @param string $from_email
     */
    public function __construct(string $from_name, string $from_email)
    {
        $this->from_name = $from_name;
        $this->from_email = $from_email;
    }

    /**
     * @param MailerRequestInterface $request
     * @return bool
     */
    public function send(MailerRequestInterface $request): bool
    {
        $headers = $this->getHeaders($request->getContentType());

        return (bool) mail($request->getTo(), $request->getSubject(), $request->getBody(), $headers);
    }

    /**
     * @return MailerRequestInterface
     */
    public function createRequest(): MailerRequestInterface
    {
        $request = new MailerRequest;
        $request->setFrom($this->from_email);

        return $request;
    }

    /**
     * @param null|string $contentType
     * @return string
     */
    protected function getHeaders(?string $contentType = null): string
    {
        if (empty($contentType)) {
            $contentType = 'text/html';
        }

        $headers  = 'Content-type: ' . $contentType . '; charset=utf-8 ' . "\r\n";
        $headers .= 'From: ' . $this->from_name . ' <' . $this->from_email . '>' . "\r\n";
        $headers .= 'Reply-To: ' . $this->from_email . "\r\n";

        return $headers;
    }
}