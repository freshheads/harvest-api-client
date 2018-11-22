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

use FH\HarvestApiClient\Model\User\User;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ProjectUserAssignment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var User
     */
    private $user;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var bool
     */
    private $isProjectManager;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var float
     */
    private $budget;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var \DateTimeImmutable
     */
    private $updatedAt;

    /**
     * @var float
     */
    private $hourlyRate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(Project $project = null): self
    {
        $this->project = $project;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user = null): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId = null): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function isProjectManager(): ?bool
    {
        return $this->isProjectManager;
    }

    public function setIsProjectManager(bool $isProjectManager = null): self
    {
        $this->isProjectManager = $isProjectManager;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive = null): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(float $budget = null): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt = null): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt = null): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getHourlyRate(): ?float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $hourlyRate = null): self
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }
}
