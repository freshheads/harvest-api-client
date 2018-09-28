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

use Iterator;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class SentInvoiceIterator extends \FilterIterator
{
    /**
     * @var \DateTimeInterface
     */
    private $minIssueDate;

    public function __construct(Iterator $iterator, \DateTimeInterface $minIssueDate)
    {
        parent::__construct($iterator);

        $this->minIssueDate = $minIssueDate;
    }


    /**
     * Check whether the current element of the iterator is acceptable
     *
     * @link http://php.net/manual/en/filteriterator.accept.php
     * @return bool true if the current element is acceptable, otherwise false.
     * @since 5.1.0
     */
    public function accept()
    {
        /** @var Invoice $invoice */
        $invoice = $this->current();

        return $invoice->isSent() && $this->minIssueDate < $invoice->getIssueDate();
    }
}
