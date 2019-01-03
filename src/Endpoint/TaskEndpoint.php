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

use FH\HarvestApiClient\Client\Client;
use FH\HarvestApiClient\Model\Task\Task;
use FH\HarvestApiClient\Model\Task\TaskCollection;
use JMS\Serializer\Serializer;

final class TaskEndpoint
{
    private $client;
    private $serializer;

    public function __construct(Client $client, Serializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @link https://help.getharvest.com/api-v2/tasks-api/tasks/tasks/#list-all-tasks
     */
    public function list(array $parameters = []): TaskCollection
    {
        $response = $this->client->get('/tasks', $parameters);

        $data = $response->getBody()->getContents();

        return $this->serializer->deserialize($data, TaskCollection::class, 'json');
    }

    /**
     * @link https://help.getharvest.com/api-v2/tasks-api/tasks/tasks/#retrieve-a-task
     */
    public function retrieve(int $id): ?Task
    {
        $response = $this->client->get("/tasks/{$id}");

        $data = $response->getBody()->getContents();

        return $this->serializer->deserialize($data, Task::class, 'json');
    }
}
