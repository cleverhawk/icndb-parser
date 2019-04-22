<?php

namespace SmartHawk\components\infrastructure\logger;

use SmartHawk\components\interfaces\infrastructure\logger\LoggerInterface;

class Logger implements LoggerInterface
{
    /** @var string */
    protected $logPath;

    /**
     * Logger constructor.
     * @param string $logPath
     */
    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
    }

    /**
     * @param string $message
     * @return bool
     */
    public function write(string $message): bool
    {
        $content = $this->getContent() . $message . "\n";

        return (bool) file_put_contents($this->logPath, $content );
    }

    /**
     * @return string
     */
    protected function getContent(): string
    {
        return file_exists($this->logPath) ? file_get_contents($this->logPath) : '';
    }
}