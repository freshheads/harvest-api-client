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

use FH\HarvestApiClient\Model\Project\Project;
use FH\HarvestApiClient\Model\Project\ProjectCollection;
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
class ProjectEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var ProjectEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new ProjectEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->addJsonResponseFromFile('project/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/projects', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfProjects(): void
    {
        $this->addJsonResponseFromFile('project/list.json');
        $projects = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(Project::class, iterator_to_array($projects));
    }

    public function testListReturnsProjectCollection(): void
    {
        $this->addJsonResponseFromFile('project/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(ProjectCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsAProject(): void
    {
        $this->addJsonResponseFromFile('project/1.json');
        $project = $this->endpoint->retrieve(1);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals(1, $project->getId());
    }

    public function testUnknownProjectThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $this->endpoint->retrieve(12345999);
    }

    public function testCreateSerializesTheProjectInTheRequest(): void
    {
        $this->addJsonResponseFromFile('project/1.json');
        $project = new Project();
        $project
            ->setName('Online Store - Phase 1');

        $newProject = $this->endpoint->create($project);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($project->getName(), $jsonBody->name);
    }

    public function testUpdateSerializesTheProjectInTheRequest(): void
    {
        $this->addJsonResponseFromFile('project/1.json');
        $project = new Project();
        $project
            ->setId(1)
            ->setName('Online Store - Phase 1');

        $updatedProject = $this->endpoint->update($project);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($project->getId(), $jsonBody->id);
        $this->assertEquals($project->getName(), $jsonBody->name);
    }

    public function testDeleteExecutesADeleteRequestWithTheGivenId(): void
    {
        $updatedClient = $this->endpoint->delete(1);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringEndsWith('/projects/1', (string) $request->getUri());
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
