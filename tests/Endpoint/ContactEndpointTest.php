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
use FH\HarvestApiClient\Model\Client\ClientCollection;
use FH\HarvestApiClient\Model\Contact\Contact;
use FH\HarvestApiClient\Model\Contact\ContactCollection;
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
class ContactEndpointTest extends TestCase
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
        $this->endpoint = new ContactEndpoint(
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

    public function testListContainsAnArrayOfContacts(): void
    {
        $this->addJsonResponseFromFile('contact/list.json');
        $contacts = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(Contact::class, iterator_to_array($contacts));
    }

    public function testListReturnsContactCollection(): void
    {
        $this->addJsonResponseFromFile('contact/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(ContactCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsAContact(): void
    {
        $this->addJsonResponseFromFile('contact/123.json');
        $contact = $this->endpoint->retrieve(12345);

        $this->assertEquals(4706479, $contact->getId());
    }

    public function testUnknownContactThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $client = $this->endpoint->retrieve(12345999);
    }

    public function testCreateSerializesTheContactInTheRequest(): void
    {
        $this->addJsonResponseFromFile('contact/123.json');
        $contact = new Contact();
        $contact
            ->setFirstName('Jane')
            ->setLastName('Doe');

        $newContact = $this->endpoint->create($contact);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($contact->getFirstName(), $jsonBody->first_name);
        $this->assertEquals($contact->getLastName(), $jsonBody->last_name);
    }

    public function testUpdateSerializesTheContactInTheRequest(): void
    {
        $this->addJsonResponseFromFile('contact/123.json');
        $contact = new Contact();
        $contact
            ->setFirstName('Jane')
            ->setLastName('Doe');

        $updatedContact = $this->endpoint->update($contact);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($updatedContact->getFirstName(), $jsonBody->first_name);
        $this->assertEquals($updatedContact->getLastName(), $jsonBody->last_name);
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
