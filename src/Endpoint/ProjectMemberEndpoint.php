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

use FH\HarvestApiClient\Model\Project\ProjectMember;
use FH\HarvestApiClient\Model\Project\ProjectMemberCollection;
use JMS\Serializer\Serializer;
use FH\HarvestApiClient\Model\Project\Project;
use FH\HarvestApiClient\Model\Project\ProjectCollection;
use FH\HarvestApiClient\Client\Client as HarvestClient;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ProjectMemberEndpoint
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
     * @return Project
     *
     * @link https://help.getharvest.com/api-v2/projects/#project/user_assignments
     */
    public function retrieve(int $id): ProjectMemberCollection
    {
        $response = $this->client->get('/projects/' . $id . '/user_assignments');

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ProjectMemberCollection::class, 'json');
    }

    /**
     * @param array $parameters
     * @return ProjectMemberCollection
     *
     * @link https://help.getharvest.com/api-v2/user_assignments/#list-all-project-members
     */
    public function list(): ProjectMemberCollection
    {
        $response = $this->client->get('/user_assignments');

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, ProjectMemberCollection::class, 'json');

        return $collection;
    }

    /**
     * @param int $id
     * @return ProjectMember
     *
     * @link https://help.getharvest.com/api-v2/projects/#assign-to-project/user_assignments
     */
    public function create(ProjectMember $projectMember): ProjectMember
    {
        $response = $this->client->postJson('/projects/' . $projectMember->getProject()->getId() . '/user_assignments',
            $this->serializer->serialize($projectMember, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ProjectMember::class, 'json');
    }

    /**
     * @param ProjectMember $project
     * @return ProjectMember
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/#project/user_assignments/#user
     */
    public function update(ProjectMember $projectMember): ProjectMember
    {
        $response = $this->client->patchJson(
            sprintf('/projects/%s/user_assignments/%s', $projectMember->getProject()->getId(), $projectMember->getId()),
            $this->serializer->serialize($projectMember, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ProjectMember::class, 'json');
    }

    /**
     * @param int $id
     * @return ProjectMember
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/#project/user_assignments/#user
     */
    public function remove(ProjectMember $projectMember): void
    {
        $this->client->delete(sprintf('/projects/%s/user_assignments/%s', $projectMember->getProject()->getId(), $projectMember->getId()));
    }
}
