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

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Model\Client\Client;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class ClientEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var ClientEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new ClientEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->addJsonResponseFromFile('client/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/clients', (string) $request->getUri());
    }

    public function testListReturnsAnArrayOfClients(): void
    {
        $this->addJsonResponseFromFile('client/list.json');
        $clients = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(Client::class, $clients);
    }

    public function testFindReturnsAClient(): void
    {
        $this->addJsonResponseFromFile('client/12345.json');
        $client = $this->endpoint->find(12345);

        $this->assertEquals(12345, $client->getId());
    }

    public function testUnknownClientThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $client = $this->endpoint->find(12345999);
    }

    public function testCreateSerializesTheClientInTheRequest(): void
    {
        $this->addJsonResponseFromFile('client/12345.json');
        $client = new Client();
        $client
            ->setName('123 Industries')
            ->setCurrency('EUR');

        $newClient = $this->endpoint->create($client);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($client->getName(), $jsonBody->name);
        $this->assertEquals($client->getCurrency(), $jsonBody->currency);
    }

    private function addJsonResponseFromFile(string $filename, int $statusCode = 200): void
    {
        $body = file_get_contents(__DIR__ . '/' . $filename);

        $this->addJsonResponse($body, $statusCode);
    }

    private function addJsonResponse(string $body, int $statusCode = 200): void
    {
        $response = $this->messageFactory->createResponse(
            $statusCode,
            null,
            [
                'Content-Type' => 'application/json'
            ],
            $body
        );

        $this->mockHttpClient->addResponse($response);
    }
}
