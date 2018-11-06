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

use FH\HarvestApiClient\Model\Client\Client;
use FH\HarvestApiClient\Model\Client\ClientContainer;
use FH\HarvestApiClient\Client\Client as HarvestClient;
use JMS\Serializer\Serializer;

/**
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 */
class ClientEndpoint
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
    public function find($id): Client
    {
        $response = $this->client->get('/clients/' . urlencode($id));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @param array $filterParameters
     * @return array
     */
    private function findAll($filterParameters = []): array
    {
        $response = $this
            ->client
            ->get('/clients', $filterParameters);

        $data = $response->getBody()->getContents();

        $clientContainer = $this
            ->serializer
            ->deserialize($data, ClientContainer::class, 'json');

        return $clientContainer->getClients();
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
     * @param Client $client
     * @return Client
     */
    public function create(Client $client): Client
    {
        $client = $this->serializer->toArray($client);

        $response = $this->client->post('/clients', $client);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @param Client $client
     * @return Client
     */
    public function update(Client $client): Client
    {
        $client = $this->serializer->toArray($client);

        $response = $this->client->patch(sprintf('/clients/%s', $client['id']), $client);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->client->delete(sprintf('/clients/%s', $id));
    }
}
