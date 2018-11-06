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
class LineContainer
{
    /**
     * @var
     */
    private $lines;

    /**
     * @return mixed
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param array $lines
     * @return $this
     */
    public function setLines(array $lines)
    {
        $this->lines = $lines;

        return $this;
    }
}
