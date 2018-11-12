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
use FH\HarvestApiClient\Model\Invoice\InvoiceCollection;
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
     *
     * @link https://help.getharvest.com/api-v2/invoices-api/invoices/invoices/#retrieve-an-invoice
     */
    public function retrieve(int $id): Invoice
    {
        $response = $this->client->get('/invoices/' . $id);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param array $parameters
     * @return InvoiceCollection
     *
     * @link https://help.getharvest.com/api-v2/invoices-api/invoices/invoices/#list-all-invoices
     */
    public function list(array $parameters = []): InvoiceCollection
    {
        $response = $this
            ->client
            ->get('/invoices', $parameters);

        $data = $response->getBody()->getContents();

        $collection = $this
            ->serializer
            ->deserialize($data, InvoiceCollection::class, 'json');

        return $collection;
    }

    /**
     * @param Invoice $invoice
     * @return Invoice
     *
     * @link https://help.getharvest.com/api-v2/invoices-api/invoices/invoices/#create-a-free-form-invoice
     */
    public function create(Invoice $invoice): Invoice
    {
        $response = $this->client->postJson('/invoices', $this->serializer->serialize($invoice, 'json'));

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param Invoice $invoice
     * @return Invoice
     *
     * @link https://help.getharvest.com/api-v2/invoices-api/invoices/invoices/#update-an-invoice
     */
    public function update(Invoice $invoice): Invoice
    {
        $response = $this->client->patch(
            sprintf('/invoices/%s', $invoice->getId()),
            $this->serializer->serialize($invoice, 'json')
        );

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param int $id invoice id
     * @param int $invoiceLineId
     *
     * @link https://help.getharvest.com/api-v2/invoices-api/invoices/invoices/#delete-an-invoice-line-item
     */
    public function deleteInvoiceItemLine(int $id, int $invoiceLineId): Invoice
    {
        $json = json_encode([
            'line_items' => ['id' => $invoiceLineId, '_destroy' => true]
        ]);

        $response = $this->client->patchJson(sprintf('/invoices/%s', $id), $json);

        $data = $response->getBody()->getContents();

        return $this
            ->serializer
            ->deserialize($data, Invoice::class, 'json');
    }

    /**
     * @param int $id
     *
     * @link https://help.getharvest.com/api-v2/invoices-api/invoices/invoices/#delete-an-invoice
     */
    public function delete(int $id): void
    {
        $this->client->delete(sprintf('/invoices/%s', $id));
    }
}
