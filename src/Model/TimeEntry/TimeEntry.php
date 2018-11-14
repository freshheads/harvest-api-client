<?php

/*
 * This file is part of the Freshheads Harvest API Client library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FH\HarvestApiClient\Model\TimeEntry;


class TimeEntry
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $spentDate;

    /**
     * @var \FH\HarvestApiClient\Model\User\User
     */
    private $user;

    /**
     * @var object
     */
    private $userAssignment;

    /**
     * @var \FH\HarvestApiClient\Model\Client\Client
     */
    private $client;

    /**
     * @var \FH\HarvestApiClient\Model\Project\Project
     */
    private $project;

    /**
     * @var object
     */
    private $task;

    /**
     * @var object
     */
    private $taskAssignment;

    /**
     * @var object
     */
    private $externalReference;

    /**
     * @var \FH\HarvestApiClient\Model\Invoice\Invoice
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSpentDate(): string
    {
        return $this->spentDate;
    }

    /**
     * @param string $spentDate
     */
    public function setSpentDate(string $spentDate)
    {
        $this->spentDate = $spentDate;
    }

    /**
     * @return \FH\HarvestApiClient\Model\User\User
     */
    public function getUser(): \FH\HarvestApiClient\Model\User\User
    {
        return $this->user;
    }

    /**
     * @param \FH\HarvestApiClient\Model\User\User $user
     */
    public function setUser(\FH\HarvestApiClient\Model\User\User $user)
    {
        $this->user = $user;
    }

    /**
     * @return object
     */
    public function getUserAssignment(): object
    {
        return $this->userAssignment;
    }

    /**
     * @param object $userAssignment
     */
    public function setUserAssignment(object $userAssignment)
    {
        $this->userAssignment = $userAssignment;
    }

    /**
     * @return \FH\HarvestApiClient\Model\Client\Client
     */
    public function getClient(): \FH\HarvestApiClient\Model\Client\Client
    {
        return $this->client;
    }

    /**
     * @param \FH\HarvestApiClient\Model\Client\Client $client
     */
    public function setClient(\FH\HarvestApiClient\Model\Client\Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \FH\HarvestApiClient\Model\Project\Project
     */
    public function getProject(): \FH\HarvestApiClient\Model\Project\Project
    {
        return $this->project;
    }

    /**
     * @param \FH\HarvestApiClient\Model\Project\Project $project
     */
    public function setProject(
        \FH\HarvestApiClient\Model\Project\Project $project
    )
    {
        $this->project = $project;
    }

    /**
     * @return object
     */
    public function getTask(): object
    {
        return $this->task;
    }

    /**
     * @param object $task
     */
    public function setTask(object $task)
    {
        $this->task = $task;
    }

    /**
     * @return object
     */
    public function getTaskAssignment(): object
    {
        return $this->taskAssignment;
    }

    /**
     * @param object $taskAssignment
     */
    public function setTaskAssignment(object $taskAssignment)
    {
        $this->taskAssignment = $taskAssignment;
    }

    /**
     * @return object
     */
    public function getExternalReference(): object
    {
        return $this->externalReference;
    }

    /**
     * @param object $externalReference
     */
    public function setExternalReference(object $externalReference)
    {
        $this->externalReference = $externalReference;
    }

    /**
     * @return \FH\HarvestApiClient\Model\Invoice\Invoice
     */
    public function getInvoice(): \FH\HarvestApiClient\Model\Invoice\Invoice
    {
        return $this->invoice;
    }

    /**
     * @param \FH\HarvestApiClient\Model\Invoice\Invoice $invoice
     */
    public function setInvoice(
        \FH\HarvestApiClient\Model\Invoice\Invoice $invoice
    )
    {
        $this->invoice = $invoice;
    }

    /**
     * @return float
     */
    public function getHours(): float
    {
        return $this->hours;
    }

    /**
     * @param float $hours
     */
    public function setHours(float $hours)
    {
        $this->hours = $hours;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->isLocked;
    }

    /**
     * @param bool $isLocked
     */
    public function setIsLocked(bool $isLocked)
    {
        $this->isLocked = $isLocked;
    }

    /**
     * @return string
     */
    public function getLockedReason(): string
    {
        return $this->lockedReason;
    }

    /**
     * @param string $lockedReason
     */
    public function setLockedReason(string $lockedReason)
    {
        $this->lockedReason = $lockedReason;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isClosed
     */
    public function setIsClosed(bool $isClosed)
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return bool
     */
    public function isBilled(): bool
    {
        return $this->isBilled;
    }

    /**
     * @param bool $isBilled
     */
    public function setIsBilled(bool $isBilled)
    {
        $this->isBilled = $isBilled;
    }

    /**
     * @return string
     */
    public function getTimerStartedAt(): string
    {
        return $this->timerStartedAt;
    }

    /**
     * @param string $timerStartedAt
     */
    public function setTimerStartedAt(string $timerStartedAt)
    {
        $this->timerStartedAt = $timerStartedAt;
    }

    /**
     * @return string
     */
    public function getStartedTime(): string
    {
        return $this->startedTime;
    }

    /**
     * @param string $startedTime
     */
    public function setStartedTime(string $startedTime)
    {
        $this->startedTime = $startedTime;
    }

    /**
     * @return string
     */
    public function getEndedTime(): string
    {
        return $this->endedTime;
    }

    /**
     * @param string $endedTime
     */
    public function setEndedTime(string $endedTime)
    {
        $this->endedTime = $endedTime;
    }

    /**
     * @return bool
     */
    public function isRunning(): bool
    {
        return $this->isRunning;
    }

    /**
     * @param bool $isRunning
     */
    public function setIsRunning(bool $isRunning)
    {
        $this->isRunning = $isRunning;
    }

    /**
     * @return bool
     */
    public function isBillable(): bool
    {
        return $this->billable;
    }

    /**
     * @param bool $billable
     */
    public function setBillable(bool $billable)
    {
        $this->billable = $billable;
    }

    /**
     * @return bool
     */
    public function isBudgeted(): bool
    {
        return $this->budgeted;
    }

    /**
     * @param bool $budgeted
     */
    public function setBudgeted(bool $budgeted)
    {
        $this->budgeted = $budgeted;
    }

    /**
     * @return float
     */
    public function getBillableRate(): float
    {
        return $this->billableRate;
    }

    /**
     * @param float $billableRate
     */
    public function setBillableRate(float $billableRate)
    {
        $this->billableRate = $billableRate;
    }

    /**
     * @return float
     */
    public function getCostRate(): float
    {
        return $this->costRate;
    }

    /**
     * @param float $costRate
     */
    public function setCostRate(float $costRate)
    {
        $this->costRate = $costRate;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(string $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

}
