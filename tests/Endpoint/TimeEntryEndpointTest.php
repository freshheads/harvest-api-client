<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Model\TimeEntry\TimeEntry;
use FH\HarvestApiClient\Model\TimeEntry\TimeEntryCollection;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

/**
 * Class TimeEntryEndpointTest
 *
 * @package FH\HarvestApiClient\Endpoint
 */
class TimeEntryEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var TimeEntryEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    public function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new TimeEntryEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->addJsonResponseFromFile('timeEntry/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/time_entries', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfTimeEntries(): void
    {
        $this->addJsonResponseFromFile('timeEntry/list.json');
        $clients = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(TimeEntry::class, iterator_to_array($clients));
    }

    public function testListReturnsTimeEntryCollection(): void
    {
        $this->addJsonResponseFromFile('timeEntry/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(TimeEntryCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(4, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsATimeEntry(): void
    {
        $this->addJsonResponseFromFile('timeEntry/54321.json');
        $timeEntries = $this->endpoint->retrieve(54321);

        $this->assertEquals(54321, $timeEntries->getId());
    }

    public function testUnknownTimeEntryThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $client = $this->endpoint->retrieve(12345999);
    }

    public function testCreateSerializesTheTimeEntryInTheRequest(): void
    {
        $this->addJsonResponseFromFile('timeEntry/54321.json');
        $timeEntry = new TimeEntry();
        $timeEntry->setBillableRate(100.0);
        $timeEntry->setSpentDate(new \DateTimeImmutable('2017-03-01'));

        $newtimeEntry = $this->endpoint->create($timeEntry);

        $request = $this->mockHttpClient->getLastRequest();
        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($timeEntry->getBillableRate(), $jsonBody->billable_rate);
        $this->assertEquals($timeEntry->getSpentDate()->format('Y-m-d'), $jsonBody->spent_date);
    }

    public function testUpdateSerializesTheTimeEntryInTheRequest(): void
    {
        $this->addJsonResponseFromFile('timeEntry/54321.json');
        $timeEntry = new TimeEntry();
        $timeEntry
            ->setId(54321)
            ->setBillableRate(100.0)
            ->setSpentDate(new \DateTimeImmutable('2017-03-01'));

        $updatedClient = $this->endpoint->update($timeEntry);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($timeEntry->getId(), $jsonBody->id);
        $this->assertEquals($timeEntry->getBillableRate(), $jsonBody->billable_rate);
        $this->assertEquals($timeEntry->getSpentDate()->format('Y-m-d'), $jsonBody->spent_date);
    }

    public function testDeleteExecutesADeleteRequestWithTheGivenId(): void
    {
        $updatedClient = $this->endpoint->delete(12345);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringEndsWith('/time_entries/12345', (string) $request->getUri());
    }

    public function testDeleteExternalReferenceExecutesADeleteRequestWithTheGivenId(): void
    {
        $updatedClient = $this->endpoint->deleteExternalReference(12345);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringEndsWith('/time_entries/12345/external_reference', (string) $request->getUri());
    }

    public function testRestartExecutesAPatchWithTheGivenId(): void
    {
        $updatedClient = $this->endpoint->restart(12345);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('PATCH', $request->getMethod());
        $this->assertStringEndsWith('/time_entries/12345/restart', (string) $request->getUri());
    }

    public function testStopExecutesAPatchWithTheGivenId(): void
    {
        $updatedClient = $this->endpoint->stop(12345);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('PATCH', $request->getMethod());
        $this->assertStringEndsWith('/time_entries/12345/stop', (string) $request->getUri());
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
                'Content-Type' => 'application/json',
            ],
            $body
        );

        $this->mockHttpClient->addResponse($response);
    }
}
