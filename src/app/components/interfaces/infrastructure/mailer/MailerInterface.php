<?php

namespace SmartHawk\components\interfaces\infrastructure\mailer;

/**
 * Interface MailerInterface
 * @package SmartHawk\components\interfaces\infrastructure\mailer
 */
interface MailerInterface
{
    /**
     * @param MailerRequestInterface $request
     * @return bool
     */
    public function send(MailerRequestInterface $request): bool;

    /**
     * @return MailerRequestInterface
     */
    public function createRequest(): MailerRequestInterface;
}
