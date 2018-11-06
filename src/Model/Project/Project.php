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
class Project
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $client;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $code;

    /**
     * @var
     */
    private $isActive;

    /**
     * @var
     */
    private $isBillable;

    /**
     * @var
     */
    private $isFixedFee;

    /**
     * @var
     */
    private $billBy;

    /**
     * @var
     */
    private $budget;

    /**
     * @var
     */
    private $budgetBy;

    /**
     * @var
     */
    private $budgetIsMonthly;

    /**
     * @var
     */
    private $notifyWhenOverBudget;

    /**
     * @var
     */
    private $overBudgetNotificationPercentage;

    /**
     * @var
     */
    private $showBudgetToAll;

    /**
     * @var
     */
    private $createdAt;

    /**
     * @var
     */
    private $updatedAt;

    /**
     * @var
     */
    private $startsOn;

    /**
     * @var
     */
    private $overBudgetNotificationDate;

    /**
     * @var
     */
    private $notes;

    /**
     * @var
     */
    private $costBudget;

    /**
     * @var
     */
    private $costBudgetIncludeExpenses;

    /**
     * @var
     */
    private $hourlyRate;

    /**
     * @var
     */
    private $fee;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getisBillable()
    {
        return $this->isBillable;
    }

    /**
     * @param mixed $isBillable
     */
    public function setIsBillable($isBillable): void
    {
        $this->isBillable = $isBillable;
    }

    /**
     * @return mixed
     */
    public function getisFixedFee()
    {
        return $this->isFixedFee;
    }

    /**
     * @param mixed $isFixedFee
     */
    public function setIsFixedFee($isFixedFee): void
    {
        $this->isFixedFee = $isFixedFee;
    }

    /**
     * @return mixed
     */
    public function getBillBy()
    {
        return $this->billBy;
    }

    /**
     * @param mixed $billBy
     */
    public function setBillBy($billBy): void
    {
        $this->billBy = $billBy;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget): void
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getBudgetBy()
    {
        return $this->budgetBy;
    }

    /**
     * @param mixed $budgetBy
     */
    public function setBudgetBy($budgetBy): void
    {
        $this->budgetBy = $budgetBy;
    }

    /**
     * @return mixed
     */
    public function getBudgetIsMonthly()
    {
        return $this->budgetIsMonthly;
    }

    /**
     * @param mixed $budgetIsMonthly
     */
    public function setBudgetIsMonthly($budgetIsMonthly): void
    {
        $this->budgetIsMonthly = $budgetIsMonthly;
    }

    /**
     * @return mixed
     */
    public function getNotifyWhenOverBudget()
    {
        return $this->notifyWhenOverBudget;
    }

    /**
     * @param mixed $notifyWhenOverBudget
     */
    public function setNotifyWhenOverBudget($notifyWhenOverBudget): void
    {
        $this->notifyWhenOverBudget = $notifyWhenOverBudget;
    }

    /**
     * @return mixed
     */
    public function getOverBudgetNotificationPercentage()
    {
        return $this->overBudgetNotificationPercentage;
    }

    /**
     * @param mixed $overBudgetNotificationPercentage
     */
    public function setOverBudgetNotificationPercentage($overBudgetNotificationPercentage): void
    {
        $this->overBudgetNotificationPercentage = $overBudgetNotificationPercentage;
    }

    /**
     * @return mixed
     */
    public function getShowBudgetToAll()
    {
        return $this->showBudgetToAll;
    }

    /**
     * @param mixed $showBudgetToAll
     */
    public function setShowBudgetToAll($showBudgetToAll): void
    {
        $this->showBudgetToAll = $showBudgetToAll;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getStartsOn()
    {
        return $this->startsOn;
    }

    /**
     * @param mixed $startsOn
     */
    public function setStartsOn($startsOn): void
    {
        $this->startsOn = $startsOn;
    }

    /**
     * @return mixed
     */
    public function getOverBudgetNotificationDate()
    {
        return $this->overBudgetNotificationDate;
    }

    /**
     * @param mixed $overBudgetNotificationDate
     */
    public function setOverBudgetNotificationDate($overBudgetNotificationDate): void
    {
        $this->overBudgetNotificationDate = $overBudgetNotificationDate;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getCostBudget()
    {
        return $this->costBudget;
    }

    /**
     * @param mixed $costBudget
     */
    public function setCostBudget($costBudget): void
    {
        $this->costBudget = $costBudget;
    }

    /**
     * @return mixed
     */
    public function getCostBudgetIncludeExpenses()
    {
        return $this->costBudgetIncludeExpenses;
    }

    /**
     * @param mixed $costBudgetIncludeExpenses
     */
    public function setCostBudgetIncludeExpenses($costBudgetIncludeExpenses): void
    {
        $this->costBudgetIncludeExpenses = $costBudgetIncludeExpenses;
    }

    /**
     * @return mixed
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * @param mixed $hourlyRate
     */
    public function setHourlyRate($hourlyRate): void
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee): void
    {
        $this->fee = $fee;
    }
}
