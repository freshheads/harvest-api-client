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

use Http\Message\MessageFactory\GuzzleMessageFactory;
use PHPUnit\Framework\TestCase;
use Http\Mock\Client as HttpMockClient;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->client = new Client($this->mockHttpClient, new GuzzleMessageFactory(), [
            'access_token' => 'Xxx',
            'account_id' => 123456
        ]);
    }

    public function testRequestContainsAccessTokenAndAccountId(): void
    {
        $this->client->request('/');

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals([123456], $request->getHeader('Harvest-Account-ID'));
        $this->assertEquals(['Bearer Xxx'], $request->getHeader('Authorization'));
    }

    public function testBaseUriIsPrependedToRequests(): void
    {
        $this->client->get('/test');
        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('https://api.harvestapp.com/api/v2/test', (string) $request->getUri());

        $this->client->post('/test');
        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('https://api.harvestapp.com/api/v2/test', (string) $request->getUri());
    }

    public function testGetCreatesAGetRequest(): void
    {
        $this->client->get('/');

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('GET', $request->getMethod());
    }

    public function testPostCreatesAPostRequest(): void
    {
        $this->client->post('/');

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('POST', $request->getMethod());
    }

    public function testPostContentTypeIsUrlEncoded(): void
    {
        $this->client->post('/');

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals(['application/x-www-form-urlencoded'], $request->getHeader('Content-Type'));
    }

    public function testGetParametersAreAppendedToTheUri(): void
    {
        $this->client->get('/', ['test' => 'value', 'param2' => 'value2']);

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertEquals('test=value&param2=value2', $request->getUri()->getQuery());
    }
}
