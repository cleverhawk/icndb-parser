<?php

namespace SmartHawk\components\infrastructure\httpClient;

use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientResponseInterface;

/**
 * Class HttpClientResponse
 * @package SmartHawk\components\infrastructure\httpClient
 */
class HttpClientResponse implements HttpClientResponseInterface
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var mixed
     */
    protected $body;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @param int $url
     * @return HttpClientResponseInterface
     */
    public function setStatusCode(int $statusCode): HttpClientResponseInterface
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param mixed $body
     * @return HttpClientResponseInterface
     */
    public function setBody($body): HttpClientResponseInterface
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param array $headers
     * @return HttpClientResponseInterface
     */
    public function setHeaders(array $headers): HttpClientResponseInterface
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}