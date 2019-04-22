<?php

namespace SmartHawk\components\interfaces\infrastructure\mailer;

/**
 * Interface MailerRequestInterface
 * @package SmartHawk\components\interfaces\infrastructure\mailer
 */
interface MailerRequestInterface
{
    /** @param string $from */
    public function setFrom(string $from): void;

    /** @return string */
    public function getFrom(): string;

    /** @param string $to */
    public function setTo(string $to): void;

    /** @return string */
    public function getTo(): string;

    /** @param string $subject */
    public function setSubject(string $subject): void;

    /** @return string */
    public function getSubject(): string;

    /** @param string $contentType */
    public function setContentType(string $contentType): void;

    /** @return string */
    public function getContentType(): string;

    /** @param string $body */
    public function setBody(string $body): void;

    /** @return string */
    public function getBody(): string;
}
