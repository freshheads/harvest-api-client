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

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ProjectContainer
{
    /**
     * @var
     */
    private $projects;

    /**
     * @return mixed
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * @param  Project[] $projects
     * @return self
     */
    public function setProjects(array $projects)
    {
        $this->projects = $projects;

        return $this;
    }
}
