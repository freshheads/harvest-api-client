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
use FH\HarvestApiClient\Model\Client\Client;
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
     * @return Client
     */
    public function find($id)
    {
        $response = $this->client->get('/users/' . urlencode($id));

        $data = $response->getBody()->getContents();

        /** User $user */
        return $this
            ->serializer
            ->deserialize($data, User::class, 'json');
    }

    /**
     * @return array|User[]
     */
    public function findAll()
    {
        $page = 1;
        $users = [];

        do {

            $response = $this->client->get('/users', ['page' => $page]);

            $data = $response->getBody()->getContents();

            /** @var UserContainer $userContainer */
            $userContainer = $this->serializer
                ->deserialize($data, UserContainer::class,'json');

            $users = array_merge($users, $userContainer->getUsers());
            $page++;

        } while (count($userContainer->getUsers()) > 0);

        return $users;
    }

    /**
     * @param User $user
     * @return string
     */
    public function create(User $user)
    {
        $response = $this->client->post('/users', (array) $user);

        return $response->getBody()->getContents();
    }

    /**
     * @param User $user
     * @param $id
     * @return string
     */
    public function update(User $user, $id)
    {
        $response = $this->client->patch(sprintf('/users/%s', $id), (array) $user);

        return $response->getBody()->getContents();
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $response = $this->client->delete(sprintf('/users/%s', $id));

        return $response->getBody()->getContents();
    }
}
