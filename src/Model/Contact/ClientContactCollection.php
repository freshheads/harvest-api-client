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
class ClientContactCollection extends PaginatedCollection
{
    /**
     * @var ClientContact[]
     */
    private $clientContacts = [];

    /**
     * @return ClientContact[]
     */
    public function getClientContacts(): array
    {
        return $this->clientContacts;
    }

    /**
     * @param ClientContact[] $clientContacts
     * @return ClientContactCollection
     */
    public function setClientContacts(array $clientContacts): self
    {
        $this->clientContacts = $clientContacts;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->clientContacts);
    }
}
