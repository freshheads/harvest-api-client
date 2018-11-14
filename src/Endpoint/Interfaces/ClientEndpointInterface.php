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

namespace FH\HarvestApiClient\Endpoint\Interfaces;

use FH\HarvestApiClient\Model\Client\Client;
use FH\HarvestApiClient\Model\Client\ClientCollection;

interface ClientEndpointInterface
{
    /**
     * @param int $id
     * @return Client
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#retrieve-a-client
     */
    public function retrieve(int $id): Client;

    /**
     * @param array $parameters
     * @return ClientCollection
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#list-all-clients
     */
    public function list(array $parameters = []): ClientCollection;

    /**
     * @param Client $client
     * @return Client
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#create-a-client
     */
    public function create(Client $client): Client;

    /**
     * @param Client $client
     * @return Client
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/clients/#update-a-client
     */
    public function update(Client $client): Client;

    /**
     * @param int $id
     */
    public function delete(int $id): void;
}