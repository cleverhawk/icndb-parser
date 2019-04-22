<?php

namespace SmartHawk\components\application\parser;

use SmartHawk\components\interfaces\application\parser\ParserInterface;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientInterface;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientResponseInterface;

class Parser implements ParserInterface
{
    const OK_STATUS = 200;
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $api_url;

    /**
     * Parser constructor.
     * @param HttpClientInterface $httpClient
     * @param string $api_url
     */
    public function __construct(HttpClientInterface $httpClient, $api_url)
    {
        $this->httpClient = $httpClient;
        $this->api_url = $api_url;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        $request = $this->httpClient->createRequest();
        $request->setBaseUrl($this->api_url);
        $request->setActionUrl('categories');
        $request->setMethod('GET');

        /** @var HttpClientResponseInterface $response */
        $response = $this->httpClient->sendRequest($request);

        return $this->processResponse($response);
    }

    /**
     * @param null|string $category
     * @return null|string
     */
    public function getJoke(?string $category = null): ?string
    {
        $request = $this->httpClient->createRequest();
        $request->setBaseUrl($this->api_url);
        $request->setActionUrl('jokes/random');
        $request->setMethod('GET');

        if (!empty($category)) {
            $request->setBody(['query' => ['limitTo' => $category]]);
        }

        /** @var HttpClientResponseInterface $response */
        $response = $this->httpClient->sendRequest($request);

        $body = $this->processResponse($response);
        $joke = !empty($body) ? $body['joke'] : null;

        return $joke;
    }

    /**
     * @param HttpClientResponseInterface $response
     * @return array
     */
    protected function processResponse(HttpClientResponseInterface $response): array
    {
        if ($response->getStatusCode() !== self::OK_STATUS) {
            return [];
        }

        $body = \GuzzleHttp\json_decode($response->getBody(), true);
        if (empty($body['type']) || $body['type'] !== 'success' || empty($body['value'])) {
            return [];
        }

        return $body['value'];
    }

}