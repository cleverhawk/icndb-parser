<?php

namespace SmartHawk\components\interfaces\infrastructure\httpClient;

/**
 * Interface HttpClientResponseInterface
 * @package SmartHawk\components\interfaces\infrastructure\httpClient
 */
interface HttpClientResponseInterface
{
    /**
     * @param int $statusCode
     * @return HttpClientResponseInterface
     */
    public function setStatusCode(int $statusCode): self;

    /**
     * @param mixed $body
     * @return HttpClientResponseInterface
     */
    public function setBody($body): self;

    /**
     * @param array $headers
     * @return HttpClientResponseInterface
     */
    public function setHeaders(array $headers): self;

    /**
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @return array
     */
    public function getHeaders(): array;
}
