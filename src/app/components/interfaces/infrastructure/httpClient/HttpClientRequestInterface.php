<?php

namespace SmartHawk\components\interfaces\infrastructure\httpClient;

/**
 * Interface HttpClientRequestInterface
 * @package SmartHawk\components\interfaces\infrastructure\httpClient
 */
interface HttpClientRequestInterface
{
    /**
     * @param string $url
     * @return HttpClientRequestInterface
     */
    public function setBaseUrl(string $url): self;

    /**
     * @param string $url
     * @return HttpClientRequestInterface
     */
    public function setActionUrl(string $url): self;

    /**
     * @param mixed $body
     * @return HttpClientRequestInterface
     */
    public function setBody($body): self;

    /**
     * @param array $headers
     * @return HttpClientRequestInterface
     */
    public function setHeaders(array $headers): self;

    /**
     * @param string $method
     * @return HttpClientRequestInterface
     */
    public function setMethod(string $method): self;

    /**
     * @param float $timeout
     * @return HttpClientRequestInterface
     */
    public function setTimeout(float $timeout): self;

    /**
     * @param float $connectTimeout
     * @return HttpClientRequestInterface
     */
    public function setConnectTimeout(float $connectTimeout): self;

    /**
     * @return string
     */
    public function getBaseUrl(): string;

    /**
     * @return string
     */
    public function getActionUrl(): string;

    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @return array|null
     */
    public function getHeaders(): ?array;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return float
     */
    public function getTimeout(): float;

    /**
     * @return float
     */
    public function getConnectTimeout(): float;
}
