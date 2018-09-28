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

use FH\HarvestApiClient\Client\Client as HarvestClient;
use FH\HarvestApiClient\Model\Client\Client;
use FH\HarvestApiClient\Model\Client\ClientContainer;
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
        $response = $this->client->get('/clients/' . urlencode($id));

        $data = $response->getBody()->getContents();

        /** Client $client */
        return $this
            ->serializer
            ->deserialize($data, Client::class, 'json');
    }

    /**
     * @return array|Client[]
     */
    public function findAll()
    {
        $page = 1;
        $clients = [];

        do {

            $response = $this->client->get('/clients', ['page' => $page]);

            $data = $response->getBody()->getContents();

            /** @var ClientContainer $clientContainer */
            $clientContainer = $this->serializer
                ->deserialize($data, ClientContainer::class,'json');

            $clients = array_merge($clients, $clientContainer->getClients());
            $page++;

        } while (count($clientContainer->getClients()) > 0);

        return $clients;
    }
}
