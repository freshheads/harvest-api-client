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

namespace FH\HarvestApiClient\Model\Invoice;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;
use Traversable;

/**
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 */
class InvoiceCollection extends PaginatedCollection
{
    /**
     * @var Invoice[]
     */
    private $invoices = [];

    /**
     * @return Invoice[]
     */
    public function getInvoices(): array
    {
        return $this->invoices;
    }

    /**
     * @param Invoice[] $invoices
     * @return InvoiceCollection
     */
    public function setInvoices(array $invoices): self
    {
        $this->invoices = $invoices;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->invoices);
    }
}
