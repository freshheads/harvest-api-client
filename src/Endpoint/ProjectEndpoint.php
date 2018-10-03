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
use FH\HarvestApiClient\Model\Client\Client;
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
     * @return Client
     */
    public function find($id)
    {
        $response = $this->client->get('/projects/' . urlencode($id));

        $data = $response->getBody()->getContents();

        /** Client $client */
        return $this
            ->serializer
            ->deserialize($data, Project::class, 'json');
    }

    /**
     * @return array|Client[]
     */
    public function findAll()
    {
        $page = 1;
        $projects = [];

        do {

            $response = $this->client->get('/projects', ['page' => $page]);

            $data = $response->getBody()->getContents();

            /** @var ProjectContainer $projectContainer */
            $projectContainer = $this->serializer
                ->deserialize($data, ProjectContainer::class,'json');

            $projects = array_merge($projects, $projectContainer->getProjects());
            $page++;

        } while (count($projectContainer->getProjects()) > 0);

        return $projects;
    }

    /**
     * @param Project $project
     * @return string
     */
    public function create(Project $project)
    {
        $response = $this->client->post('/projects', (array) $project);

        return $response->getBody()->getContents();
    }

    /**
     * @param Project $project
     * @param $id
     * @return string
     */
    public function update(Project $project, $id)
    {
        $response = $this->client->patch(sprintf('/projects/%s', $id), (array) $project);

        return $response->getBody()->getContents();
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $response = $this->client->delete(sprintf('/projects/%s', $id));

        return $response->getBody()->getContents();
    }
}
