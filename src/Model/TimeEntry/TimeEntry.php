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
use FH\HarvestApiClient\Model\User\User;

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
     * @var User
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

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getSpentDate(): ?\DateTimeImmutable
    {
        return $this->spentDate;
    }

    /**
     * @param \DateTimeImmutable|null $spentDate
     * @return TimeEntry
     */
    public function setSpentDate(\DateTimeImmutable $spentDate = null): self
    {
        $this->spentDate = $spentDate;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return self
     */
    public function setUser(User $user = null): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return array
     */
    public function getUserAssignment(): ?array
    {
        return $this->userAssignment;
    }

    /**
     * @param array $userAssignment
     * @return self
     */
    public function setUserAssignment(array $userAssignment = null): self
    {
        $this->userAssignment = $userAssignment;

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client|null $client
     * @return self
     */
    public function setClient(Client $client = null): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Project
     */
    public function getProject(): ?Project
    {
        return $this->project;
    }

    /**
     * @param Project|null $project
     * @return self
     */
    public function setProject(Project $project = null): self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return array
     */
    public function getTask(): ?array
    {
        return $this->task;
    }

    /**
     * @param array $task
     * @return self
     */
    public function setTask(array $task = null): self
    {
        $this->task = $task;

        return $this;
    }

    /**
     * @return array
     */
    public function getTaskAssignment(): ?array
    {
        return $this->taskAssignment;
    }

    /**
     * @param array $taskAssignment
     */
    public function setTaskAssignment(array $taskAssignment = null)
    {
        $this->taskAssignment = $taskAssignment;

        return $this;
    }

    /**
     * @return array
     */
    public function getExternalReference(): ?array
    {
        return $this->externalReference;
    }

    /**
     * @param array $externalReference
     */
    public function setExternalReference(array $externalReference = null): self
    {
        $this->externalReference = $externalReference;

        return $this;
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return float
     */
    public function getHours(): ?float
    {
        return $this->hours;
    }

    /**
     * @param float $hours
     * @return self
     */
    public function setHours(float $hours = null): self
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes = null): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLocked(): ?bool
    {
        return $this->isLocked;
    }

    /**
     * @param bool $isLocked
     * @return self
     */
    public function setIsLocked(bool $isLocked = null): self
    {
        $this->isLocked = $isLocked;

        return $this;
    }

    /**
     * @return string
     */
    public function getLockedReason(): ?string
    {
        return $this->lockedReason;
    }

    /**
     * @param string $lockedReason
     * @return self
     */
    public function setLockedReason(string $lockedReason = null): self
    {
        $this->lockedReason = $lockedReason;

        return $this;
    }

    /**
     * @return bool
     */
    public function isClosed(): ?bool
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isClosed
     */
    public function setIsClosed(bool $isClosed = null): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBilled(): ?bool
    {
        return $this->isBilled;
    }

    /**
     * @param bool $isBilled
     * @return self
     */
    public function setIsBilled(bool $isBilled = null): self
    {
        $this->isBilled = $isBilled;

        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getTimerStartedAt(): ?\DateTimeImmutable
    {
        return $this->timerStartedAt;
    }

    /**
     * @param \DateTimeImmutable|null $timerStartedAt
     * @return TimeEntry
     */
    public function setTimerStartedAt(\DateTimeImmutable $timerStartedAt = null): self
    {
        $this->timerStartedAt = $timerStartedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartedTime(): ?string
    {
        return $this->startedTime;
    }

    /**
     * @param string $startedTime
     * @return self
     */
    public function setStartedTime(string $startedTime = null): self
    {
        $this->startedTime = $startedTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndedTime(): ?string
    {
        return $this->endedTime;
    }

    /**
     * @param string $endedTime
     * @return self
     */
    public function setEndedTime(string $endedTime = null): self
    {
        $this->endedTime = $endedTime;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRunning(): ?bool
    {
        return $this->isRunning;
    }

    /**
     * @param bool $isRunning
     * @return self
     */
    public function setIsRunning(bool $isRunning = null): self
    {
        $this->isRunning = $isRunning;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBillable(): ?bool
    {
        return $this->billable;
    }

    /**
     * @param bool $billable
     * @return self
     */
    public function setBillable(bool $billable = null): self
    {
        $this->billable = $billable;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBudgeted(): ?bool
    {
        return $this->budgeted;
    }

    /**
     * @param bool $budgeted
     * @return self
     */
    public function setBudgeted(bool $budgeted = null): self
    {
        $this->budgeted = $budgeted;

        return $this;
    }

    /**
     * @return float
     */
    public function getBillableRate(): ?float
    {
        return $this->billableRate;
    }

    /**
     * @param float $billableRate
     * @return self
     */
    public function setBillableRate(float $billableRate = null): self
    {
        $this->billableRate = $billableRate;

        return $this;
    }

    /**
     * @return float
     */
    public function getCostRate(): ?float
    {
        return $this->costRate;
    }

    /**
     * @param float $costRate
     * @return self
     */
    public function setCostRate(float $costRate = null): self
    {
        $this->costRate = $costRate;

        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return self
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt = null): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(\DateTimeImmutable $updatedAt = null): self
    {
        $this->updatedAt = $updatedAt;

        return $this;

    }
}
