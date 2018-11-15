<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 * (c) Freshheads B.V. <info@freshheads.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Client;

use Http\Client\Exception\HttpException;
use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class Client
{
    const DEFAULT_BASE_URL = 'https://api.harvestapp.com/api/v2';

    const DEFAULT_USER_AGENT = 'Freshheads Harvest API Client (https://packagist.org/packages/freshheads/harvest-api-client)';

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $accountId;

    /**
     * @var string
     */
    private $userAgent;

    public function __construct(HttpClient $client, MessageFactory $messageFactory, array $options = [])
    {
        $this->client = $client;
        $this->messageFactory = $messageFactory;
        $this->accessToken = $options['access_token'];
        $this->accountId = $options['account_id'];
        $this->baseUrl = $options['base_url'] ?? self::DEFAULT_BASE_URL;
        $this->userAgent = $options['user_agent'] ?? self::DEFAULT_USER_AGENT;
    }

    public function request(string $url, string $method = 'GET', string $body = null, array $headers = []): ResponseInterface
    {
        $headers['Harvest-Account-ID'] = $this->accountId;
        $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        $headers['User-Agent'] = $this->userAgent;

        if (!array_key_exists('Accept', $headers)) {
            $headers['Accept'] = 'application/json';
        }

        if (!array_key_exists('Content-Type', $headers)) {
            $headers['Content-Type'] = 'application/json';
        }

        $request = $this->messageFactory
            ->createRequest($method, $url, $headers, $body);

        return $this->client
            ->sendRequest($request);
    }

    public function get(string $url, array $parameters = [], array $headers = []): ResponseInterface
    {
        $queryString = $this->buildQueryString($parameters);

        return $this->request($this->buildUrl($url, $queryString), 'GET', null, $headers);
    }

    public function delete(string $url, array $parameters = [], array $headers = []): ResponseInterface
    {
        $queryString = $this->buildQueryString($parameters);

        return $this->request($this->buildUrl($url, $queryString), 'DELETE', null, $headers);
    }

    public function post(string $url, array $parameters = [], array $headers = []): ResponseInterface
    {
        $body = $this->buildQueryString($parameters);
        $headers['Content-Type'] = 'application/x-www-form-urlencoded';

        return $this->request($this->buildUrl($url), 'POST', $body, $headers);
    }

    public function postJson(string $url, string $json, array $headers = []): ResponseInterface
    {
        return $this->request($this->buildUrl($url), 'POST', $json, $headers);
    }

    public function patch($url, array $parameters = [], array $headers = []): ResponseInterface
    {
        $body = $this->buildQueryString($parameters);
        $headers['Content-Type'] = 'application/x-www-form-urlencoded';

        return $this->request($this->buildUrl($url), 'PATCH', $body, $headers);
    }

    public function patchJson($url, string $json, array $headers = []): ResponseInterface
    {
        return $this->request($this->buildUrl($url), 'PATCH', $json, $headers);
    }

    private function buildQueryString(array $parameters): string
    {
        if (count($parameters) > 0) {
            return http_build_query($parameters, '', '&');
        }

        return '';
    }

    private function buildUrl(string $url, string $queryString = ''): string
    {
        $newUrl = $this->baseUrl . $url;

        if (strlen($queryString) > 0) {
            $newUrl .= '?' . $queryString;
        }

        return $newUrl;
    }
}
