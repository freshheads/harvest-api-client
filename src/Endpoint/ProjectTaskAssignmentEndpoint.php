<?php
declare(strict_types=1);

namespace FH\HarvestApiClient\Endpoint;

use FH\HarvestApiClient\Client\Client;
use FH\HarvestApiClient\Model\Project\ProjectTaskAssignmentCollection;
use JMS\Serializer\Serializer;

final class ProjectTaskAssignmentEndpoint
{
    private $client;
    private $serializer;

    public function __construct(Client $client, Serializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function list(int $projectId): ProjectTaskAssignmentCollection
    {
        $response = $this->client->get("/projects/{$projectId}/task_assignments");

        $data = $response->getBody()->getContents();

        return $this->serializer->deserialize($data, ProjectTaskAssignmentCollection::class, 'json');
    }
}
