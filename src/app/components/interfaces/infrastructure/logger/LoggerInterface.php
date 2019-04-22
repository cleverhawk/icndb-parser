<?php

namespace SmartHawk\components\interfaces\infrastructure\logger;

/**
 * Interface LoggerInterface
 * @package SmartHawk\components\interfaces\infrastructure\logger
 */
interface LoggerInterface
{
    /**
     * @param string $message
     * @return bool
     */
    public function write(string $message): bool;
}
