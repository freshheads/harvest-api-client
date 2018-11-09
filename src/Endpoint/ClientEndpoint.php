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
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 *
 * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#update-a-client
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
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#retrieve-a-client
     */
    public function find(int $id): Client
    {
        $response = $this->client->get('/clients/' . $id);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @param array $parameters
     * @return Client[]
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#list-all-clients
     */
    public function list(array $parameters = []): array
    {
        $response = $this
            ->client
            ->get('/clients', $parameters);

        $data = $response->getBody()->getContents();

        $clientContainer = $this
            ->serializer
            ->deserialize($data, ClientContainer::class, 'json');

        return $clientContainer->getClients();
    }

    /**
     * @param Client $client
     * @return Client
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#create-a-client
     */
    public function create(Client $client): Client
    {
        $response = $this->client->postJson('/clients', $this->serializer->serialize($client, 'json'));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @param Client $client
     * @return Client
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#update-a-client
     */
    public function update(Client $client): Client
    {
        $response = $this->client->patchJson(
            sprintf('/clients/%s', $client->getId()),
            $this->serializer->serialize($client, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->client->delete(sprintf('/clients/%s', $id));
    }
}
