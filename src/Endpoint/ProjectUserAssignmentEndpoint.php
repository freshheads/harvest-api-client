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
use JMS\Serializer\Serializer;
use FH\HarvestApiClient\Model\Project\Project;
use FH\HarvestApiClient\Model\Project\ProjectCollection;
use FH\HarvestApiClient\Client\Client as HarvestClient;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ProjectUserAssignmentEndpoint
{
    /**
     * @var HarvestClient
     */
    private $client;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ClientEndpoint constructor.
     * @param HarvestClient $client
     * @param Serializer $serializer
     */
    public function __construct(
        HarvestClient $client,
        Serializer $serializer
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param int $id
     * @return ProjectUserAssignmentCollection
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/user-assignments/#user-assignments
     */
    public function retrieve(int $id): ProjectUserAssignmentCollection
    {
        $response = $this->client->get('/projects/' . $id . '/user_assignments');

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ProjectUserAssignmentCollection::class, 'json');
    }

    /**
     * @return ProjectUserAssignmentCollection
     * @link https://help.getharvest.com/api-v2/projects-api/projects/user-assignments/#list-all-user-assignments
     */
    public function list(): ProjectUserAssignmentCollection
    {
        $response = $this->client->get('/user_assignments');

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, ProjectUserAssignmentCollection::class, 'json');

        return $collection;
    }

    /**
     * @param int $id
     * @return ProjectUserAssignment
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/user-assignments/#create-a-user-assignment
     */
    public function create(ProjectUserAssignment $projectUserAssignment): ProjectUserAssignment
    {
        $response = $this->client->postJson('/projects/' . $projectUserAssignment->getProject()->getId() . '/user_assignments',
            $this->serializer->serialize($projectUserAssignment, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ProjectUserAssignment::class, 'json');
    }

    /**
     * @param ProjectUserAssignment $project
     * @return ProjectUserAssignment
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/user-assignments/#update-a-user-assignment
     */
    public function update(ProjectUserAssignment $projectUserAssignment): ProjectUserAssignment
    {
        $response = $this->client->patchJson(
            sprintf('/projects/%s/user_assignments/%s', $projectUserAssignment->getProject()->getId(), $projectUserAssignment->getId()),
            $this->serializer->serialize($projectUserAssignment, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ProjectUserAssignment::class, 'json');
    }

    /**
     * @param ProjectUserAssignment $projectUserAssignment
     * @return ProjectUserAssignment
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/user-assignments/#delete-a-user-assignment
     */
    public function remove(ProjectUserAssignment $projectUserAssignment): void
    {
        $this->client->delete(sprintf('/projects/%s/user_assignments/%s', $projectUserAssignment->getProject()->getId(), $projectUserAssignment->getId()));
    }
}
