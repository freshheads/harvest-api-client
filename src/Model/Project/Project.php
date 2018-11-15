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

use FH\HarvestApiClient\Model\Client\Client;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class Project
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var bool
     */
    private $isBillable;

    /**
     * @var bool
     */
    private $isFixedFee;

    /**
     * @var string
     */
    private $billBy;

    /**
     * @var float
     */
    private $budget;

    /**
     * @var string
     */
    private $budgetBy;

    /**
     * @var bool
     */
    private $budgetIsMonthly;

    /**
     * @var bool
     */
    private $notifyWhenOverBudget;

    /**
     * @var float
     */
    private $overBudgetNotificationPercentage;

    /**
     * @var bool
     */
    private $showBudgetToAll;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var \DateTimeImmutable
     */
    private $updatedAt;

    /**
     * @var \DateTimeImmutable
     */
    private $startsOn;

    /**
     * @var \DateTimeImmutable
     */
    private $endsOn;

    /**
     * @var bool
     */
    private $overBudgetNotificationDate;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var float
     */
    private $costBudget;

    /**
     * @var bool
     */
    private $costBudgetIncludeExpenses;

    /**
     * @var float
     */
    private $hourlyRate;

    /**
     * @var float
     */
    private $fee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id = null): self
    {
        $this->id = $id;

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

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId($clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code = null): self
    {
        $this->code = $code;

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

    public function isBillable(): ?bool
    {
        return $this->isBillable;
    }

    public function setIsBillable(bool $isBillable = null): self
    {
        $this->isBillable = $isBillable;

        return $this;
    }

    public function isFixedFee(): ?bool
    {
        return $this->isFixedFee;
    }

    public function setIsFixedFee(bool $isFixedFee = null): self
    {
        $this->isFixedFee = $isFixedFee;

        return $this;
    }

    public function getBillBy(): ?string
    {
        return $this->billBy;
    }

    public function setBillBy(string $billBy = null): self
    {
        $this->billBy = $billBy;

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

    public function getBudgetBy(): ?string
    {
        return $this->budgetBy;
    }

    public function setBudgetBy(string $budgetBy = null): self
    {
        $this->budgetBy = $budgetBy;

        return $this;
    }

    public function isBudgetIsMonthly(): ?bool
    {
        return $this->budgetIsMonthly;
    }

    public function setBudgetIsMonthly(bool $budgetIsMonthly = null): self
    {
        $this->budgetIsMonthly = $budgetIsMonthly;

        return $this;
    }

    public function isNotifyWhenOverBudget(): ?bool
    {
        return $this->notifyWhenOverBudget;
    }

    public function setNotifyWhenOverBudget(bool $notifyWhenOverBudget = null): self
    {
        $this->notifyWhenOverBudget = $notifyWhenOverBudget;

        return $this;
    }

    public function getOverBudgetNotificationPercentage(): ?float
    {
        return $this->overBudgetNotificationPercentage;
    }

    public function setOverBudgetNotificationPercentage(float $overBudgetNotificationPercentage = null): self
    {
        $this->overBudgetNotificationPercentage = $overBudgetNotificationPercentage;

        return $this;
    }

    public function isShowBudgetToAll(): ?bool
    {
        return $this->showBudgetToAll;
    }

    public function setShowBudgetToAll(bool $showBudgetToAll = null): self
    {
        $this->showBudgetToAll = $showBudgetToAll;

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

    public function getStartsOn(): ?\DateTimeImmutable
    {
        return $this->startsOn;
    }

    public function setStartsOn(\DateTimeImmutable $startsOn = null): self
    {
        $this->startsOn = $startsOn;

        return $this;
    }

    public function getEndsOn(): ?\DateTimeImmutable
    {
        return $this->endsOn;
    }

    public function setEndsOn(\DateTimeImmutable $endsOn = null): self
    {
        $this->endsOn = $endsOn;

        return $this;
    }

    public function isOverBudgetNotificationDate(): ?bool
    {
        return $this->overBudgetNotificationDate;
    }

    public function setOverBudgetNotificationDate(bool $overBudgetNotificationDate = null): self
    {
        $this->overBudgetNotificationDate = $overBudgetNotificationDate;

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

    public function getCostBudget(): ?float
    {
        return $this->costBudget;
    }

    public function setCostBudget(float $costBudget = null): self
    {
        $this->costBudget = $costBudget;

        return $this;
    }

    public function isCostBudgetIncludeExpenses(): ?bool
    {
        return $this->costBudgetIncludeExpenses;
    }

    public function setCostBudgetIncludeExpenses(bool $costBudgetIncludeExpenses = null): self
    {
        $this->costBudgetIncludeExpenses = $costBudgetIncludeExpenses;

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

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function setFee(float $fee  = null): self
    {
        $this->fee = $fee;

        return $this;
    }
}
