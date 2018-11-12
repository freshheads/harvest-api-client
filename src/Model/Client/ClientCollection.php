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

namespace FH\HarvestApiClient\Model\Client;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;
use Traversable;

/**
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 */
class ClientCollection extends PaginatedCollection
{
    /**
     * @var Client[]
     */
    private $clients;

    /**
     * @return Client[]
     */
    public function getClients(): array
    {
        return $this->clients;
    }

    /**
     * @param  Client[] $clients
     * @return self
     */
    public function setClients(array $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->clients);
    }
}
