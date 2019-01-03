<?php
declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Model\Task\Task;
use FH\HarvestApiClient\Model\Task\TaskCollection;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

final class TaskEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var TaskEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new TaskEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('task/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/tasks', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfTasks(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('task/list.json');
        $tasks = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(Task::class, iterator_to_array($tasks));
    }

    public function testListReturnsTaskCollection(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('task/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(TaskCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(8, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsATask(): void
    {
        $this->ensureHttpClientReturnsDummyResponseFromFile('task/1.json');
        $task = $this->endpoint->retrieve(1);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals(1, $task->getId());
    }

    public function testUnknownTaskThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->ensureHttpClientReturnsResponse('', 404);

        $this->endpoint->retrieve(999999999);
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
