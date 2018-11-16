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

namespace FH\HarvestApiClient\Model\User;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;
use Traversable;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class UserCollection extends PaginatedCollection
{
    /**
     * @var User[]
     */
    private $users = [];

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     * @return UserCollection
     */
    public function setUsers(array $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->users);
    }
}
