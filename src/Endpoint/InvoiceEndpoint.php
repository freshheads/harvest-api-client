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
use FH\HarvestApiClient\Model\Invoice\Invoice;
use FH\HarvestApiClient\Model\Invoice\InvoiceContainer;
use JMS\Serializer\Serializer;

/**
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class InvoiceEndpoint
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(
        Client $client,
        Serializer $serializer
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param int $id
     * @return Invoice
     */
    public function find($id)
    {
        $response = $this->client
            ->get('/invoices/' . urlencode($id));

        $data = $response->getBody()->getContents();

        /** @var Invoice $invoice */
        $invoice = $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');

        return $invoice;
    }

    /**
     * @param int $page
     * @param \DateTimeInterface $updatedSince
     * @param int $clientId
     * @return array|Invoice[]
     */
    public function findPaged($page = 1, \DateTimeInterface $updatedSince = null, $clientId = null)
    {
        if (!$updatedSince instanceof \DateTimeInterface) {
            $updatedSince = new \DateTimeImmutable('now');
        }

        $queryParameters = [
            'page' => $page,
            'updated_since' => $updatedSince->format(\DateTime::ISO8601),
            'client_id' => $clientId
        ];

        $response = $this
            ->client
            ->get('/invoices', $queryParameters);

        $data = $response->getBody()->getContents();

        $invoiceContainers = $this
            ->serializer
            ->deserialize($data, InvoiceContainer::class, 'json');

        return $invoiceContainers->getInvoices();
    }

    /**
     * @param \DateTimeInterface $since
     * @return Invoice[]
     */
    public function findByUpdatedSince(\DateTimeInterface $since)
    {
        $totalInvoices = [];
        $page = 1;

        while (true) {
            $invoices = $this->findPaged($page, $since);

            if (count($invoices) < 1) {
                break;
            }

            $totalInvoices = array_merge($totalInvoices, $invoices);
            $page += 1;
        }

        return $totalInvoices;
    }
}
