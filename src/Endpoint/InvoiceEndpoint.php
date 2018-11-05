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
use FH\HarvestApiClient\Model\Invoice\Invoice;
use FH\HarvestApiClient\Model\Invoice\InvoiceContainer;
use FH\HarvestApiClient\Client\Client as HarvestClient;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class InvoiceEndpoint
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
        $response = $this->client->get('/invoices/' . urlencode($id));

        $data = $response->getBody()->getContents();

        /** Client $client */
        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @return array|Client[]
     */
    public function findAll()
    {
        $page = 1;
        $projects = [];

        do {

            $response = $this->client->get('/invoices', ['page' => $page]);

            $data = $response->getBody()->getContents();

            /** @var Invoice $invoiceContainer */
            $invoiceContainer = $this->serializer
                ->deserialize($data, InvoiceContainer::class,'json');

            $invoices = array_merge($projects, $invoiceContainer->getInvoices());
            $page++;

        } while (count($invoiceContainer->getInvoices()) > 0);

        return $invoices;
    }

    /**
     * @param Invoice $invoice
     * @return string
     */
    public function create(Invoice $invoice)
    {
        $response = $this->client->post('/invoices', (array) $invoice);

        return $response->getBody()->getContents();
    }

    /**
     * @param Invoice $invoice
     * @param $id
     * @return string
     */
    public function update(Invoice $invoice, $id)
    {
        $response = $this->client->patch(sprintf('/invoices/%s', $id), (array) $invoice);

        return $response->getBody()->getContents();
    }

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        $response = $this->client->delete(sprintf('/invoices/%s', $id));

        return $response->getBody()->getContents();
    }
}
