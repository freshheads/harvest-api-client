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

class TimeEntryContainer
{

    /**
     * @var array
     */
    private $timeEntries = [];

    /**
     * @return mixed
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
    public function setTimeEntries(array $timeEntries)
    {
        $this->timeEntries = $timeEntries;

        return $this;
    }

}
