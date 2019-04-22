<?php

namespace SmartHawk\components\infrastructure\httpClient;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface as GuzzleResponse;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientInterface;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientResponseInterface;
use SmartHawk\components\interfaces\infrastructure\httpClient\HttpClientRequestInterface;

/**
 * Class HttpClient
 * @package SmartHawk\components\infrastructure\httpClient
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @param HttpClientRequestInterface $request
     * @return HttpClientResponseInterface
     */
    public function sendRequest(HttpClientRequestInterface $request): HttpClientResponseInterface
    {
        $client = $this->createHttpClient();
        $response = $client->request($request->getMethod(), $this->prepareUrl($request), $this->prepareParams($request));

        return $this->prepareResponse($response);
    }

    /**
     * @return HttpClientRequestInterface
     */
    public function createRequest(): HttpClientRequestInterface
    {
        return new HttpClientRequest();
    }

    /**
     * @return Client
     */
    protected function createHttpClient(): Client
    {
        return new Client();
    }

    /**
     * @param HttpClientRequestInterface $request
     * @return string
     */
    protected function prepareUrl(HttpClientRequestInterface $request): string
    {
        return rtrim($request->getBaseUrl(), '/') . '/' . ltrim($request->getActionUrl(), '/');
    }

    /**
     * @param HttpClientRequestInterface $request
     * @return array
     */
    protected function prepareParams(HttpClientRequestInterface $request): array
    {
        $params = [];

        if (is_array($request->getBody()) && !empty($request->getBody())) {
            $params = array_merge($params, $request->getBody());
        }

        if (is_array($request->getHeaders()) && !empty($request->getHeaders())) {
            $params['headers'] = $request->getHeaders();
        }

        return $params;
    }

    /**
     * @param GuzzleResponse $guzzleResponse
     * @return HttpClientResponse
     */
    protected function prepareResponse(GuzzleResponse $guzzleResponse): HttpClientResponse
    {
        $response = new HttpClientResponse();

        $response->setStatusCode($guzzleResponse->getStatusCode());
        $response->setHeaders($guzzleResponse->getHeaders());
        $response->setBody($guzzleResponse->getBody()->getContents());

        return $response;
    }
}
