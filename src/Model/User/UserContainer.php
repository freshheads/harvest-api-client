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

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class UserContainer
{
    /**
     * @var
     */
    public $users;

    /**
     * @return mixed
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param  User[] $users
     * @return self
     */
    public function setUsers(array $users)
    {
        $this->users = $users;

        return $this;
    }
}
