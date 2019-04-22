<?php

namespace SmartHawk\components\infrastructure\mailer;

use SmartHawk\components\interfaces\infrastructure\mailer\MailerRequestInterface;

/**
 * Class MailerRequest
 * @package SmartHawk\components\infrastructure\mailer
 */
class MailerRequest implements MailerRequestInterface
{
    /** @var string */
    protected $from = '';

    /** @var string */
    protected $to = '';

    /** @var string */
    protected $subject = '';

    /** @var string */
    protected $contentType = '';

    /** @var string */
    protected $body = '';

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $contentType
     */
    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}