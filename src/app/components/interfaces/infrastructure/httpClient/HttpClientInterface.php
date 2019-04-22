<?php

namespace SmartHawk\components\interfaces\infrastructure\httpClient;

/**
 * Interface HttpClientInterface
 * @package SmartHawk\components\interfaces\infrastructure\httpClient
 */
interface HttpClientInterface
{
    /**
     * @param HttpClientRequestInterface $request
     * @return HttpClientResponseInterface
     */
    public function sendRequest(HttpClientRequestInterface $request): HttpClientResponseInterface;

    /**
     * @return HttpClientRequestInterface
     */
    public function createRequest(): HttpClientRequestInterface;
}
