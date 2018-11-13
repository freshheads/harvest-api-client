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
use FH\HarvestApiClient\Model\User\UserCollection;
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
     *
     * @link https://help.getharvest.com/api-v2/users-api/users/users/#retrieve-a-user
     */
    public function retrieve(int $id): User
    {
        $response = $this->client->get('/users/' . $id);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * Returns the current user
     *
     * @return User
     *
     * @link https://help.getharvest.com/api-v2/users-api/users/users/#retrieve-the-currently-authenticated-user
     */
    public function me(): User
    {
        $response = $this->client->get('/users/me');

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @param array $parameters
     * @return UserCollection
     *
     * @link https://help.getharvest.com/api-v2/users-api/users/users/#list-all-users
     */
    public function list(array $parameters = []): UserCollection
    {
        $response = $this
            ->client
            ->get('/users', $parameters);

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, UserCollection::class, 'json');

        return $collection;
    }

    /**
     * @param User $user
     * @return User
     *
     * @link https://help.getharvest.com/api-v2/users-api/users/users/#create-a-user
     */
    public function create(User $user): User
    {
        $response = $this->client->postJson('/users', $this->serializer->serialize($user, 'json'));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @param User $user
     * @return string
     *
     * @link https://help.getharvest.com/api-v2/users-api/users/users/#update-a-user
     */
    public function update(User $user)
    {
        $response = $this->client->patchJson(
            sprintf('/users/%s', $user->getId()),
            $this->serializer->serialize($user, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @param int $id
     *
     * @link https://help.getharvest.com/api-v2/users-api/users/users/#delete-a-user
     */
    public function delete(int $id): void
    {
        $this->client->delete(sprintf('/users/%s', $id));
    }
}
