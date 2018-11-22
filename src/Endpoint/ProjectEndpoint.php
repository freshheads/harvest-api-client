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

use JMS\Serializer\Serializer;
use FH\HarvestApiClient\Model\Project\Project;
use FH\HarvestApiClient\Model\Project\ProjectCollection;
use FH\HarvestApiClient\Client\Client as HarvestClient;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ProjectEndpoint
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
     * @link https://help.getharvest.com/api-v2/projects-api/projects/projects/#retrieve-a-project
     */
    public function retrieve(int $id): Project
    {
        $response = $this->client->get('/projects/' . $id);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @param array $parameters
     * @return ProjectCollection
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/projects/#list-all-projects
     */
    public function list(array $parameters = []): ProjectCollection
    {
        $response = $this
            ->client
            ->get('/projects', $parameters);

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, ProjectCollection::class, 'json');

        return $collection;
    }

    /**
     * @param Project $project
     * @return Project
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/projects/#create-a-project
     */
    public function create(Project $project): Project
    {
        $response = $this->client->postJson('/projects', $this->serializer->serialize($project, 'json'));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @param Project $project
     * @return Project
     *
     * @link https://help.getharvest.com/api-v2/projects-api/projects/projects/#update-a-project
     */
    public function update(Project $project): Project
    {
        $response = $this->client->patchJson(
            sprintf('/projects/%s', $project->getId()),
            $this->serializer->serialize($project, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @param int $id
     * @link https://help.getharvest.com/api-v2/projects-api/projects/projects/#delete-a-project
     */
    public function delete(int $id): void
    {
        $this->client->delete(sprintf('/projects/%s', $id));
    }
}
