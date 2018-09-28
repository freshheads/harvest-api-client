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

/**
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 */
class ClientContainer
{
    /**
     * @var Client[]
     */
    private $clients;

    /**
     * @return Client[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param  Client[] $clients
     * @return self
     */
    public function setClients(array $clients)
    {
        $this->clients = $clients;

        return $this;
    }
}
