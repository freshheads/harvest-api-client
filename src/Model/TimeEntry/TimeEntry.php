<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Model\TimeEntry;

use FH\HarvestApiClient\Client\Client;
use FH\HarvestApiClient\Model\Invoice\Invoice;
use FH\HarvestApiClient\Model\Project\Project;

class TimeEntry
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTimeImmutable
     */
    private $spentDate;

    /**
     * @var TimeEntryUser
     */
    private $user;

    /**
     * @var array
     */
    private $userAssignment;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var array
     */
    private $task;

    /**
     * @var array
     */
    private $taskAssignment;

    /**
     * @var array
     */
    private $externalReference;

    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * @var float
     */
    private $hours;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var boolean
     */
    private $isLocked;

    /**
     * @var string
     */
    private $lockedReason;

    /**
     * @var boolean
     */
    private $isClosed;

    /**
     * @var boolean
     */
    private $isBilled;

    /**
     * @var  string
     */
    private $timerStartedAt;

    /**
     * @var string
     */
    private $startedTime;

    /**
     * @var string
     */
    private $endedTime;

    /**
     * @var boolean
     */
    private $isRunning;

    /**
     * @var boolean
     */
    private $billable;

    /**
     * @var boolean
     */
    private $budgeted;

    /**
     * @var float
     */
    private $billableRate;

    /**
     * @var float
     */
    private $costRate;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    public function getSpentDate(): ?\DateTimeImmutable
    {
        return $this->spentDate;
    }

    public function setSpentDate(\DateTimeImmutable $spentDate = null): self
    {
        $this->spentDate = $spentDate;

        return $this;
    }

    public function getUser(): ?TimeEntryUser
    {
        return $this->user;
    }

    public function setUser(TimeEntryUser $user = null): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUserAssignment(): ?array
    {
        return $this->userAssignment;
    }

    public function setUserAssignment(array $userAssignment = null): self
    {
        $this->userAssignment = $userAssignment;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client = null): self
    {
        $this->client = $client;

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

    public function getTask(): ?array
    {
        return $this->task;
    }

    public function setTask(array $task = null): self
    {
        $this->task = $task;

        return $this;
    }

    public function getTaskAssignment(): ?array
    {
        return $this->taskAssignment;
    }

    public function setTaskAssignment(array $taskAssignment = null)
    {
        $this->taskAssignment = $taskAssignment;

        return $this;
    }

    public function getExternalReference(): ?array
    {
        return $this->externalReference;
    }

    public function setExternalReference(array $externalReference = null): self
    {
        $this->externalReference = $externalReference;

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getHours(): ?float
    {
        return $this->hours;
    }

    public function setHours(float $hours = null): self
    {
        $this->hours = $hours;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes = null): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function isLocked(): ?bool
    {
        return $this->isLocked;
    }

    public function setIsLocked(bool $isLocked = null): self
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    public function getLockedReason(): ?string
    {
        return $this->lockedReason;
    }

    public function setLockedReason(string $lockedReason = null): self
    {
        $this->lockedReason = $lockedReason;

        return $this;
    }

    public function isClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(bool $isClosed = null): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    public function isBilled(): ?bool
    {
        return $this->isBilled;
    }

    public function setIsBilled(bool $isBilled = null): self
    {
        $this->isBilled = $isBilled;

        return $this;
    }

    public function getTimerStartedAt(): ?\DateTimeImmutable
    {
        return $this->timerStartedAt;
    }

    public function setTimerStartedAt(\DateTimeImmutable $timerStartedAt = null): self
    {
        $this->timerStartedAt = $timerStartedAt;

        return $this;
    }

    public function getStartedTime(): ?string
    {
        return $this->startedTime;
    }

    public function setStartedTime(string $startedTime = null): self
    {
        $this->startedTime = $startedTime;

        return $this;
    }

    public function getEndedTime(): ?string
    {
        return $this->endedTime;
    }

    public function setEndedTime(string $endedTime = null): self
    {
        $this->endedTime = $endedTime;

        return $this;
    }

    public function isRunning(): ?bool
    {
        return $this->isRunning;
    }

    public function setIsRunning(bool $isRunning = null): self
    {
        $this->isRunning = $isRunning;

        return $this;
    }

    public function isBillable(): ?bool
    {
        return $this->billable;
    }

    public function setBillable(bool $billable = null): self
    {
        $this->billable = $billable;

        return $this;
    }

    public function isBudgeted(): ?bool
    {
        return $this->budgeted;
    }

    public function setBudgeted(bool $budgeted = null): self
    {
        $this->budgeted = $budgeted;

        return $this;
    }

    public function getBillableRate(): ?float
    {
        return $this->billableRate;
    }

    public function setBillableRate(float $billableRate = null): self
    {
        $this->billableRate = $billableRate;

        return $this;
    }

    public function getCostRate(): ?float
    {
        return $this->costRate;
    }

    public function setCostRate(float $costRate = null): self
    {
        $this->costRate = $costRate;

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
}
