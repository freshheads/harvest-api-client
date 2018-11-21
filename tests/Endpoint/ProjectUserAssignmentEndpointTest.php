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

use FH\HarvestApiClient\Model\Project\ProjectUserAssignment;
use FH\HarvestApiClient\Model\Project\ProjectUserAssignmentCollection;
use FH\HarvestApiClient\Model\User\User;
use FH\HarvestApiClient\Model\Project\Project;
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
class ProjectUserAssignmentEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var ProjectUserAssignment
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new ProjectUserAssignmentEndpoint(
            TestClientFactory::create($this->mockHttpClient),
            TestSerializerFactory::create()
        );
        $this->messageFactory = new MessageFactory\GuzzleMessageFactory();
    }

    public function testListCallsListUrl(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $this->endpoint->list();

        $request = $this->mockHttpClient->getLastRequest();
        $this->assertStringEndsWith('/user_assignments', (string) $request->getUri());
    }

    public function testListContainsAnArrayOfProjectUserAssignments(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $projectUserAssignment = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(ProjectUserAssignment::class, iterator_to_array($projectUserAssignment));
    }

    public function testListReturnsProjectUserAssignmentCollection(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(ProjectUserAssignmentCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsAProjectUserAssignments(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $collection = $this->endpoint->retrieve(1);

        $this->assertInstanceOf(ProjectUserAssignmentCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testUnknownProjectUserAssignmentThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $this->endpoint->retrieve(12345999);
    }

    public function testCreateSerializesTheProjectUserAssignmentInTheRequest(): void
    {
        $this->addJsonResponseFromFile('project/member/1.json');

        $project = new Project();
        $project
            ->setId(1)
            ->setName("Online Store")
            ->setBudget(1200);

        $user = new User();
        $user
            ->setId(666)
            ->setFirstName("Jim")
            ->setLastName("Allen");

        $projectUserAssignment = new ProjectUserAssignment();
        $projectUserAssignment
            ->setId(1)
            ->setProject($project)
            ->setUser($user)
            ->setBudget(120);

        $newProjectUserAssignment = $this->endpoint->create($projectUserAssignment);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($newProjectUserAssignment->getBudget(), $jsonBody->budget);

        $this->assertEquals($newProjectUserAssignment->getUser()->getid(), $jsonBody->user->id);
        $this->assertEquals($newProjectUserAssignment->getUser()->getFirstName(), $jsonBody->user->first_name);
        $this->assertEquals($newProjectUserAssignment->getUser()->getLastName(), $jsonBody->user->last_name);

        $this->assertEquals($newProjectUserAssignment->getProject()->getId(), $jsonBody->project->id);
        $this->assertEquals($newProjectUserAssignment->getProject()->getName(), $jsonBody->project->name);
        $this->assertEquals($newProjectUserAssignment->getProject()->getBudget(), $jsonBody->project->budget);
    }

    public function testUpdateSerializesTheProjectUserAssignmentInTheRequest(): void
    {
        $this->addJsonResponseFromFile('project/member/1.json');

        $project = new Project();
        $project->setId(1);
        $project->setName("Online Store");

        $user = new User();
        $user
            ->setId(666)
            ->setFirstName("Jim")
            ->setLastName("Allen");

        $projectUserAssignment = new ProjectUserAssignment();
        $projectUserAssignment
            ->setId(1)
            ->setProject($project)
            ->setBudget(120)
            ->setUser($user)
            ->setIsProjectManager(true);

        $updatedProjectUserAssignment = $this->endpoint->update($projectUserAssignment);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($updatedProjectUserAssignment->getBudget(), $jsonBody->budget);
        $this->assertEquals($updatedProjectUserAssignment->isProjectManager(), $jsonBody->is_project_manager);

        $this->assertEquals($updatedProjectUserAssignment->getUser()->getid(), $jsonBody->user->id);
        $this->assertEquals($updatedProjectUserAssignment->getUser()->getFirstName(), $jsonBody->user->first_name);
        $this->assertEquals($updatedProjectUserAssignment->getUser()->getLastName(), $jsonBody->user->last_name);

        $this->assertEquals($updatedProjectUserAssignment->getProject()->getId(), $jsonBody->project->id);
        $this->assertEquals($updatedProjectUserAssignment->getProject()->getName(), $jsonBody->project->name);
    }

    public function testRemoveExecutesADeleteRequestWithTheGivenId(): void
    {
        $project = new Project();
        $project->setId(1);

        $projectUserAssignment = new ProjectUserAssignment();
        $projectUserAssignment
            ->setId(1)
            ->setProject($project);

        $updatedClient = $this->endpoint->remove($projectUserAssignment);

        $request = $this->mockHttpClient->getLastRequest();

        $this->assertEquals('DELETE', $request->getMethod());
        $this->assertStringEndsWith('/projects/1/user_assignments/1', (string) $request->getUri());
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
