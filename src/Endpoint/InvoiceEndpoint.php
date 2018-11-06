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
     * InvoiceEndpoint constructor.
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
     * @return Invoice
     */
    public function find($id): Invoice
    {
        $response = $this->client->get('/invoices/' . urlencode($id));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param array $filterParameters
     * @return array
     */
    private function findAll($filterParameters = []): array
    {
        $response = $this
            ->client
            ->get('/invoices', $filterParameters);

        $data = $response->getBody()->getContents();

        $invoiceContainer = $this
            ->serializer
            ->deserialize($data, InvoiceContainer::class, 'json');

        return $invoiceContainer->getInvoices();
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
     * @param Invoice $invoice
     * @return Invoice
     */
    public function create(Invoice $invoice): Invoice
    {
        $invoice = $this->serializer->toArray($invoice);

        $response = $this->client->post('/invoices', $invoice);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param Invoice $invoice
     * @return Invoice
     */
    public function update(Invoice $invoice): Invoice
    {
        $invoice = $this->serializer->toArray($invoice);

        $response = $this->client->patch(sprintf('/invoices/%s', $invoice['id']), $invoice);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->client->delete(sprintf('/invoices/%s', $id));
    }
}
