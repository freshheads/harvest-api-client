<?php
declare(strict_types=1);

namespace FH\HarvestApiClient\Model\Project;

use FH\HarvestApiClient\Model\Collection\PaginatedCollection;

final class ProjectTaskAssignmentCollection extends PaginatedCollection
{
    private $taskAssignments = [];

    /**
     * @return ProjectTaskAssignment[]
     */
    public function getTaskAssignments(): array
    {
        return $this->taskAssignments;
    }

    public function setTaskAssignments(array $taskAssignments): self
    {
        $this->taskAssignments = $taskAssignments;

        return $this;
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->taskAssignments);
    }
}
