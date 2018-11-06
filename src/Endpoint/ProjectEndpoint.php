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
use FH\HarvestApiClient\Model\Project\ProjectContainer;
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
     */
    public function find($id): Project
    {
        $response = $this->client->get('/projects/' . urlencode($id));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @param array $filterParameters
     * @return array
     */
    private function findAll($filterParameters = []): array
    {
        $response = $this
            ->client
            ->get('/projects', $filterParameters);

        $data = $response->getBody()->getContents();

        $projectContainer = $this
            ->serializer
            ->deserialize($data, ProjectContainer::class, 'json');

        return $projectContainer->getProjects();
    }

    /**
     * @param int $page
     * @param \DateTimeInterface|null $updatedSince
     * @return array
     * @throws \Exception
     */
    public function findPaged($page = 1, \DateTimeInterface $updatedSince = null): array
    {
        if (!$updatedSince instanceof \DateTimeInterface) {
            $updatedSince = new \DateTimeImmutable('now');
        }

        $queryParameters = [
            'page' => $page,
            'updated_since' => $updatedSince->format(\DateTime::ISO8601),
        ];

        return $this->findAll($queryParameters);
    }

    /**
     * @param Project $project
     * @return Project
     */
    public function create(Project $project): Project
    {
        $project = $this->serializer->toArray($project);

        $response = $this->client->post('/projects', $project);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @param Project $project
     * @return Project
     */
    public function update(Project $project): Project
    {
        $project = $this->serializer->toArray($project);

        $response = $this->client->patch(sprintf('/projects/%s', $project['id']), $project);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->client->delete(sprintf('/projects/%s', $id));
    }
}
