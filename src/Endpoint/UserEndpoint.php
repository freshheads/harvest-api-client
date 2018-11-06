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
use FH\HarvestApiClient\Model\User\UserContainer;
use JMS\Serializer\Serializer;
use FH\HarvestApiClient\Client\Client as HarvestClient;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class UserEndpoint
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
     * @return User
     */
    public function find($id): User
    {
        $response = $this->client->get('/users/' . urlencode($id));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @param array $filterParameters
     * @return array
     */
    private function findAll($filterParameters = []): array
    {
        $response = $this
            ->client
            ->get('/users', $filterParameters);

        $data = $response->getBody()->getContents();

        $userContainer = $this
            ->serializer
            ->deserialize($data, UserContainer::class, 'json');

        return $userContainer->getUsers();
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
     * @param User $user
     * @return User
     */
    public function create(User $user): User
    {
        $user = $this->serializer->toArray($user);

        $response = $this->client->post('/users', $user);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @param User $user
     * @return string
     */
    public function update(User $user)
    {
        $user = $this->serializer->toArray($user);

        $response = $this->client->patch(sprintf('/users/%s', $user['id']), $user);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->client->delete(sprintf('/users/%s', $id));
    }
}
