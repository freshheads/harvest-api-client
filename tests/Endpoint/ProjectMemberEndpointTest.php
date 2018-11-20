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

use FH\HarvestApiClient\Model\User\User;
use FH\HarvestApiClient\Model\Project\Project;
use FH\HarvestApiClient\Model\Invoice\Invoice;
use FH\HarvestApiClient\Model\Invoice\InvoiceCollection;
use FH\HarvestApiClient\Model\Project\ProjectMemberCollection;
use Http\Client\Common\Exception\ClientErrorException;
use Http\Message\MessageFactory;
use Http\Mock\Client as HttpMockClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use FH\HarvestApiClient\Model\Project\ProjectMember;

require_once 'TestClientFactory.php';
require_once 'TestSerializerFactory.php';

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ProjectMemberEndpointTest extends TestCase
{
    /**
     * @var HttpMockClient
     */
    private $mockHttpClient;

    /**
     * @var InvoiceEndpoint
     */
    private $endpoint;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    protected function setUp()
    {
        $this->mockHttpClient = new HttpMockClient();
        $this->endpoint = new ProjectMemberEndpoint(
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

    public function testListContainsAnArrayOfProjectMembers(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $projectMembers = $this->endpoint->list();

        $this->assertContainsOnlyInstancesOf(ProjectMember::class, iterator_to_array($projectMembers));
    }

    public function testListReturnsProjectMemberCollection(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $collection = $this->endpoint->list();

        $this->assertInstanceOf(ProjectMemberCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testRetrieveReturnsAProjectMember(): void
    {
        $this->addJsonResponseFromFile('project/member/list.json');
        $collection = $this->endpoint->retrieve(1);

        $this->assertInstanceOf(ProjectMemberCollection::class, $collection);
        $this->assertEquals(1, $collection->getPage());
        $this->assertEquals(1, $collection->getTotalPages());
        $this->assertEquals(2, $collection->getTotalEntries());
    }

    public function testUnknownProjectMemberThrowsAnException(): void
    {
        $this->expectException(ClientErrorException::class);
        $this->expectExceptionCode(404);

        $this->addJsonResponse('', 404);

        $this->endpoint->retrieve(12345999);
    }

    public function testAttachSerializesTheProjectMemberInTheRequest(): void
    {
        $this->addJsonResponseFromFile('project/member/1.json');

        $project = new Project();
        $project->setId(1);
        $project->setName("CRM");

        $user = new User();
        $user
            ->setId(1)
            ->setFirstName("Lars")
            ->setLastName("Janssen");

        $projectMember = new ProjectMember();
        $projectMember
            ->setId(1)
            ->setProject($project)
            ->setUser($user)
            ->setBudget(120);

        $newProjectMember = $this->endpoint->attach($projectMember);

        $request = $this->mockHttpClient->getLastRequest();

        $jsonBody = json_decode($request->getBody()->getContents());

        $this->assertEquals($projectMember->getBudget(), 120);

        $this->assertEquals($projectMember->getUser()->getid(), 1);
        $this->assertEquals($projectMember->getUser()->getFirstName(), "Lars");
        $this->assertEquals($projectMember->getUser()->getLastName(), "Janssen");

        $this->assertEquals($projectMember->getProject()->getId(), 1);
        $this->assertEquals($projectMember->getProject()->getName(), "CRM");
    }

    public function testDetachExecutesADeleteRequestWithTheGivenId(): void
    {
        $project = new Project();
        $project->setId(1);

        $projectMember = new ProjectMember();
        $projectMember
            ->setId(1)
            ->setProject($project);

        $updatedClient = $this->endpoint->detach($projectMember);

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
