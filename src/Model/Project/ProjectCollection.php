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
class ProjectCollection extends PaginatedCollection
{
    /**
     * @var
     */
    private $projects;

    public function getProjects(): array
    {
        return $this->projects;
    }

    public function setProjects(array $projects): self
    {
        $this->projects = $projects;

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->projects);
    }
}
