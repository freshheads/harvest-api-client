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

namespace FH\HarvestApiClient\Model\Collection;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
abstract class PaginatedCollection implements \IteratorAggregate
{
    /**
     * @var int
     */
    private $perPage;

    /**
     * @var int
     */
    private $totalPages;

    /**
     * @var int
     */
    private $totalEntries;

    /**
     * @var int
     */
    private $nextPage;

    /**
    * @var int
    */
    private $previousPage;

    /**
     * @var int
     */
    private $page;

    /**
     * @var array
     */
    private $links;

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return self
     */
    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param int $totalPage
     * @return self
     */
    public function setTotalPages(int $totalPages): self
    {
        $this->totalPages = $totalPages;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalEntries(): int
    {
        return $this->totalEntries;
    }

    /**
     * @param int $totalEntries
     * @return self
     */
    public function setTotalEntries(int $totalEntries): self
    {
        $this->totalEntries = $totalEntries;

        return $this;
    }

    /**
     * @return int
     */
    public function getNextPage(): ?int
    {
        return $this->nextPage;
    }

    /**
     * @param int $nextPage
     * @return self
     */
    public function setNextPage(int $nextPage = null): self
    {
        $this->nextPage = $nextPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getPreviousPage(): ?int
    {
        return $this->previousPage;
    }

    /**
     * @param int $previousPage
     * @return self
     */
    public function setPreviousPage(int $previousPage = null): self
    {
        $this->previousPage = $previousPage;

        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return self
     */
    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param array $links
     */
    public function setLinks(array $links): void
    {
        $this->links = $links;
    }
}
