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

namespace FH\HarvestApiClient\Model\TimeEntry;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;

class TimeEntryCollection extends PaginatedCollection
{
    /**
     * @var TimeEntry[]
     */
    private $timeEntries = [];

    /**
     * @return TimeEntry[]
     */
    public function getTimeEntries(): array
    {
        return $this->timeEntries;
    }

    /**
     * @param  TimeEntry[] $timeEntries
     *
     * @return self
     */
    public function setTimeEntries(array $timeEntries): self
    {
        $this->timeEntries = $timeEntries;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->timeEntries);
    }
}
