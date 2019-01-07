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

namespace FH\HarvestApiClient\Model\Project;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
final class ProjectUserAssignmentCollection extends PaginatedCollection
{
    private $userAssignments;

    /**
     * @return ProjectUserAssignment[]
     */
    public function getUserAssignments(): array
    {
        return $this->userAssignments;
    }

    /**
     * @param ProjectUserAssignment[] $projects
     *
     * @return $this
     */
    public function setUserAssignments(array $projects): self
    {
        $this->userAssignments = $userAssignments;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->userAssignments);
    }
}
