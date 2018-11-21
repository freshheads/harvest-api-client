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

namespace FH\HarvestApiClient\Model\Contact;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;
use Traversable;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ContactCollection extends PaginatedCollection
{
    /**
     * @var Contact[]
     */
    private $contacts = [];

    /**
     * @return Contact[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param Contact[] $contacts
     * @return InvoiceCollection
     */
    public function setContacts(array $contacts): self
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->contacts);
    }
}
