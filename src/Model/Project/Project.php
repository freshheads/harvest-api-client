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

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Project
     */
    public function setId(int $id = null): self
    {
        $this->id = $id;

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
     * @param Client $client
     * @return Project
     */
    public function setClient(Client $client = null): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName(string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Project
     */
    public function setCode(string $code = null): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return Project
     */
    public function setIsActive(bool $isActive = null): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBillable(): ?bool
    {
        return $this->isBillable;
    }

    /**
     * @param bool $isBillable
     * @return Project
     */
    public function setIsBillable(bool $isBillable = null): self
    {
        $this->isBillable = $isBillable;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFixedFee(): ?bool
    {
        return $this->isFixedFee;
    }

    /**
     * @param bool $isFixedFee
     * @return Project
     */
    public function setIsFixedFee(bool $isFixedFee = null): self
    {
        $this->isFixedFee = $isFixedFee;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillBy(): ?string
    {
        return $this->billBy;
    }

    /**
     * @param string $billBy
     * @return Project
     */
    public function setBillBy(string $billBy = null): self
    {
        $this->billBy = $billBy;

        return $this;
    }

    /**
     * @return float
     */
    public function getBudget(): ?float
    {
        return $this->budget;
    }

    /**
     * @param float $budget
     * @return Project
     */
    public function setBudget(float $budget = null): self
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * @return string
     */
    public function getBudgetBy(): ?string
    {
        return $this->budgetBy;
    }

    /**
     * @param string $budgetBy
     * @return Project
     */
    public function setBudgetBy(string $budgetBy = null): self
    {
        $this->budgetBy = $budgetBy;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBudgetIsMonthly(): ?bool
    {
        return $this->budgetIsMonthly;
    }

    /**
     * @param bool $budgetIsMonthly
     * @return Project
     */
    public function setBudgetIsMonthly(bool $budgetIsMonthly = null): self
    {
        $this->budgetIsMonthly = $budgetIsMonthly;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNotifyWhenOverBudget(): ?bool
    {
        return $this->notifyWhenOverBudget;
    }

    /**
     * @param bool $notifyWhenOverBudget
     * @return Project
     */
    public function setNotifyWhenOverBudget(bool $notifyWhenOverBudget = null): self
    {
        $this->notifyWhenOverBudget = $notifyWhenOverBudget;

        return $this;
    }

    /**
     * @return float
     */
    public function getOverBudgetNotificationPercentage(): ?float
    {
        return $this->overBudgetNotificationPercentage;
    }

    /**
     * @param float $overBudgetNotificationPercentage
     * @return Project
     */
    public function setOverBudgetNotificationPercentage(float $overBudgetNotificationPercentage = null): self
    {
        $this->overBudgetNotificationPercentage = $overBudgetNotificationPercentage;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShowBudgetToAll(): ?bool
    {
        return $this->showBudgetToAll;
    }

    /**
     * @param bool $showBudgetToAll
     * @return Project
     */
    public function setShowBudgetToAll(bool $showBudgetToAll = null): self
    {
        $this->showBudgetToAll = $showBudgetToAll;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable $createdAt
     * @return Project
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt = null): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeImmutable $updatedAt
     * @return Project
     */
    public function setUpdatedAt(\DateTimeImmutable $updatedAt = null): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getStartsOn(): ?\DateTimeImmutable
    {
        return $this->startsOn;
    }

    /**
     * @param \DateTimeImmutable $startsOn
     * @return Project
     */
    public function setStartsOn(\DateTimeImmutable $startsOn = null): self
    {
        $this->startsOn = $startsOn;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getEndsOn(): ?\DateTimeImmutable
    {
        return $this->endsOn;
    }

    /**
     * @param \DateTimeImmutable $endsOn
     * @return Project
     */
    public function setEndsOn(\DateTimeImmutable $endsOn = null): self
    {
        $this->endsOn = $endsOn;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOverBudgetNotificationDate(): ?bool
    {
        return $this->overBudgetNotificationDate;
    }

    /**
     * @param bool $overBudgetNotificationDate
     * @return Project
     */
    public function setOverBudgetNotificationDate(bool $overBudgetNotificationDate = null): self
    {
        $this->overBudgetNotificationDate = $overBudgetNotificationDate;

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
     * @return Project
     */
    public function setNotes(string $notes = null): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return float
     */
    public function getCostBudget(): ?float
    {
        return $this->costBudget;
    }

    /**
     * @param float $costBudget
     * @return Project
     */
    public function setCostBudget(float $costBudget = null): self
    {
        $this->costBudget = $costBudget;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCostBudgetIncludeExpenses(): ?bool
    {
        return $this->costBudgetIncludeExpenses;
    }

    /**
     * @param bool $costBudgetIncludeExpenses
     * @return Project
     */
    public function setCostBudgetIncludeExpenses(bool $costBudgetIncludeExpenses = null): self
    {
        $this->costBudgetIncludeExpenses = $costBudgetIncludeExpenses;

        return $this;
    }

    /**
     * @return float
     */
    public function getHourlyRate(): ?float
    {
        return $this->hourlyRate;
    }

    /**
     * @param float $hourlyRate
     * @return Project
     */
    public function setHourlyRate(float $hourlyRate = null): self
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }

    /**
     * @return float
     */
    public function getFee(): ?float
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     * @return Project
     */
    public function setFee(float $fee  = null): self
    {
        $this->fee = $fee;

        return $this;
    }
}
