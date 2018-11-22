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

use FH\HarvestApiClient\Model\Contact\ClientContact;
use FH\HarvestApiClient\Model\Contact\ClientContactCollection;
use JMS\Serializer\Serializer;
use FH\HarvestApiClient\Client\Client as HarvestClient;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ClientContactEndpoint
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
     * @return ClientContact
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/contacts/#retrieve-a-contact
     */
    public function retrieve(int $id): ClientContact
    {
        $response = $this->client->get('/contacts/' . $id);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ClientContact::class, 'json');
    }

    /**
     * @param array $parameters
     * @return ClientContactCollection
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/contacts/#list-all-contacts
     */
    public function list(array $parameters = []): ClientContactCollection
    {
        $response = $this
            ->client
            ->get('/contacts', $parameters);

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, ClientContactCollection::class, 'json');

        return $collection;
    }

    /**
     * @param ClientContact $contact
     * @return ClientContact
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/contacts/#create-a-contact
     */
    public function create(ClientContact $clientContact): ClientContact
    {
        $response = $this->client->postJson('/contacts', $this->serializer->serialize($clientContact, 'json'));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ClientContact::class, 'json');
    }

    /**
     * @param ClientContact $contact
     * @return ClientContact
     *
     * @link https://help.getharvest.com/api-v2/clients-api/clients/contacts/#update-a-contact
     */
    public function update(ClientContact $clientContact): ClientContact
    {
        $response = $this->client->patchJson(
            sprintf('/contacts/%s', $clientContact->getId()),
            $this->serializer->serialize($clientContact, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, ClientContact::class, 'json');
    }

    /**
     * @param int $id
     * @link https://help.getharvest.com/api-v2/clients-api/clients/contacts/#delete-a-contact
     */
    public function delete(int $id): void
    {
        $this->client->delete(sprintf('/contacts/%s', $id));
    }
}
