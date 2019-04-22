<?php

namespace SmartHawk\components\infrastructure\httpClient;

use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientRequestInterface;

/**
 * Class HttpClientRequest
 * @package SmartHawk\components\infrastructure\httpClient
 */
class HttpClientRequest implements HttpClientRequestInterface
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $actionUrl;

    /**
     * @var mixed
     */
    protected $body;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var float
     */
    protected $timeout;

    /**
     * @var float
     */
    protected $connectTimeout;

    /**
     * @param string $url
     * @return HttpClientRequestInterface
     */
    public function setBaseUrl(string $url): HttpClientRequestInterface
    {
        $this->baseUrl = $url;
        return $this;
    }

    /**
     * @param string $url
     * @return HttpClientRequestInterface
     */
    public function setActionUrl(string $url): HttpClientRequestInterface
    {
        $this->actionUrl = $url;
        return $this;
    }

    /**
     * @param mixed $body
     * @return HttpClientRequestInterface
     */
    public function setBody($body): HttpClientRequestInterface
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param array $headers
     * @return HttpClientRequestInterface
     */
    public function setHeaders(array $headers): HttpClientRequestInterface
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param string $method
     * @return HttpClientRequestInterface
     */
    public function setMethod(string $method): HttpClientRequestInterface
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param float $timeout
     * @return HttpClientRequestInterface
     */
    public function setTimeout(float $timeout): HttpClientRequestInterface
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @param float $connectTimeout
     * @return HttpClientRequestInterface
     */
    public function setConnectTimeout(float $connectTimeout): HttpClientRequestInterface
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getActionUrl(): string
    {
        return $this->actionUrl;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return array|null
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return float
     */
    public function getTimeout(): float
    {
        return $this->timeout;
    }

    /**
     * @return float
     */
    public function getConnectTimeout(): float
    {
        return $this->connectTimeout;
    }

}