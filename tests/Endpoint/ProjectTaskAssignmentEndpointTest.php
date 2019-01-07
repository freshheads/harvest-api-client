<?php
declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Endpoint\ProjectTaskAssignmentEndpoint;
use FH\HarvestApiClient\Model\Project\ProjectTaskAssignmentCollection;
use FH\HarvestApiClient\Model\Project\ProjectTaskAssignment;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class ProjectTaskAssignmentEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var ProjectTaskAssignmentEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new ProjectTaskAssignmentEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('project/taskAssignment/list.json');
        $this->endpoint->list(1);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertStringEndsWith('/task_assignments', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfTaskAssignments(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('project/taskAssignment/list.json');
        $taskAssignments = $this->endpoint->list(1);

        $this->assertContainsOnlyInstancesOf(ProjectTaskAssignment::class, iterator_to_array($taskAssignments));
    }

    public function testListReturnsTaskAssignmentCollection(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('project/taskAssignment/list.json');
        $collection = $this->endpoint->list(1);

        $this->assertInstanceOf(ProjectTaskAssignmentCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(23, $collection->getTotalEntries());
    }

    private function ensureHttpClientReturnsDummyResponseFromFile(string $responseFilename, int $statusCode = 200): void
    {
        $body = file_get_contents(__DIR__ . '/' . $responseFilename);

        $this->ensureHttpClientReturnsResponse($body, $statusCode);
    }

    private function ensureHttpClientReturnsResponse(string $body, int $statusCode = 200): void
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $response = $this->messageFactory->createResponse($statusCode, null, $headers, $body);

        $this->mockHttpClient->addResponse($response);
    }
}
