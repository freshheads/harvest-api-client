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

namespace FH\HarvestApiClient\Model\Task;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;
use Traversable;

final class TaskCollection extends PaginatedCollection
{
    private $tasks = [];

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param Task[] $tasks
     */
    public function setTasks(array $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->tasks);
    }
}
