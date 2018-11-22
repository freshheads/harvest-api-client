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
use FH\HarvestApiClient\Endpoint\ClientContactEndpoint;
use FH\HarvestApiClient\Model\contact\ClientContactCollection;
use FH\HarvestApiClient\Model\Contact\ClientContact;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ClientContactEndpointTest extends TestCase
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
        $this->endpoint = new ClientContactEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->addJsonResponseFromFile('contact/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/contacts', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfClientContacts(): void
    {
        $this->addJsonResponseFromFile('contact/list.json');
        $clientContacts = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(ClientContact::class, iterator_to_array($clientContacts));
    }

    public function testListReturnsClientContactCollection(): void
    {
        $this->addJsonResponseFromFile('contact/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(ClientContactCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsAClientContact(): void
    {
        $this->addJsonResponseFromFile('contact/123.json');
        $clientContact = $this->endpoint->retrieve(12345);

        $this->assertEquals(4706479, $clientContact->getId());
    }

    public function testUnknownClientContactThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $client = $this->endpoint->retrieve(12345999);
    }

    public function testCreateSerializesTheClientContactInTheRequest(): void
    {
        $this->addJsonResponseFromFile('contact/123.json');
        $clientContact = new ClientContact();
        $clientContact
            ->setFirstName('Jane')
            ->setLastName('Doe');

        $newClientContact = $this->endpoint->create($clientContact);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($newClientContact->getFirstName(), $jsonBody->first_name);
        $this->assertEquals($newClientContact->getLastName(), $jsonBody->last_name);
    }

    public function testUpdateSerializesTheClientContactInTheRequest(): void
    {
        $this->addJsonResponseFromFile('contact/123.json');
        $clientContact = new ClientContact();
        $clientContact
            ->setFirstName('Jane')
            ->setLastName('Doe');

        $updatedClientContact = $this->endpoint->update($clientContact);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($updatedClientContact->getFirstName(), $jsonBody->first_name);
        $this->assertEquals($updatedClientContact->getLastName(), $jsonBody->last_name);
    }

    public function testDeleteExecutesADeleteRequestWithTheGivenId(): void
    {
        $deletedContact = $this->endpoint->delete(12345);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringEndsWith('/contacts/12345', (string) $request->getUri());
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
