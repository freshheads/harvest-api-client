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

namespace FH\HarvestApiClient\Model\User;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class User
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $telephone;

    /**
     * @var string
     */
    public $timezone;

    /**
     * @var bool
     */
    public $hasAccessToAllFutureProjects;

    /**
     * @var bool
     */
    public $isContractor;

    /**
     * @var bool
     */
    public $isAdmin;

    /**
     * @var bool
     */
    public $isProjectManager;

    /**
     * @var bool
     */
    public $canSeeRates;

    /**
     * @var bool
     */
    public $canCreateProjects;

    /**
     * @var bool
     */
    public $canCreateInvoices;

    /**
     * @var bool
     */
    public $isActive;

    /**
     * @var int
     */
    public $weeklyCapacity;

    /**
     * @var float
     */
    public $defaultHourlyRate;

    /**
     * @var float
     */
    public $costRate;

    /**
     * @var string[]
     */
    public $roles;

    /**
     * @var string
     */
    public $avatarUrl;

    /**
     * @var \DateTimeImmutable
     */
    public $createdAt;

    /**
     * @var \DateTimeImmutable
     */
    public $updatedAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return self
     */
    public function setFirstName(string $firstName = null): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return self
     */
    public function setLastName(string $lastName = null): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email = null): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return self
     */
    public function setTelephone(string $telephone = null): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return self
     */
    public function setTimezone(string $timezone = null): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHasAccessToAllFutureProjects(): ?bool
    {
        return $this->hasAccessToAllFutureProjects;
    }

    /**
     * @param bool $hasAccessToAllFutureProjects
     * @return self
     */
    public function setHasAccessToAllFutureProjects(bool $hasAccessToAllFutureProjects = null): self
    {
        $this->hasAccessToAllFutureProjects = $hasAccessToAllFutureProjects;

        return $this;
    }

    /**
     * @return bool
     */
    public function isContractor(): ?bool
    {
        return $this->isContractor;
    }

    /**
     * @param bool $isContractor
     * @return self
     */
    public function setIsContractor(bool $isContractor = null): self
    {
        $this->isContractor = $isContractor;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     * @return self
     */
    public function setIsAdmin(bool $isAdmin = null): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * @return bool
     */
    public function isProjectManager(): ?bool
    {
        return $this->isProjectManager;
    }

    /**
     * @param bool $isProjectManager
     * @return self
     */
    public function setIsProjectManager(bool $isProjectManager = null): self
    {
        $this->isProjectManager = $isProjectManager;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanSeeRates(): ?bool
    {
        return $this->canSeeRates;
    }

    /**
     * @param bool $canSeeRates
     * @return self
     */
    public function setCanSeeRates(bool $canSeeRates = null): self
    {
        $this->canSeeRates = $canSeeRates;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanCreateProjects(): ?bool
    {
        return $this->canCreateProjects;
    }

    /**
     * @param bool $canCreateProjects
     * @return self
     */
    public function setCanCreateProjects(bool $canCreateProjects = null): self
    {
        $this->canCreateProjects = $canCreateProjects;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanCreateInvoices(): ?bool
    {
        return $this->canCreateInvoices;
    }

    /**
     * @param bool $canCreateInvoices
     * @return self
     */
    public function setCanCreateInvoices(bool $canCreateInvoices = null): self
    {
        $this->canCreateInvoices = $canCreateInvoices;

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
     * @return self
     */
    public function setIsActive(bool $isActive = null): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeeklyCapacity(): ?int
    {
        return $this->weeklyCapacity;
    }

    /**
     * @param int $weeklyCapacity
     * @return self
     */
    public function setWeeklyCapacity(int $weeklyCapacity = null): self
    {
        $this->weeklyCapacity = $weeklyCapacity;

        return $this;
    }

    /**
     * @return float
     */
    public function getDefaultHourlyRate(): ?float
    {
        return $this->defaultHourlyRate;
    }

    /**
     * @param float $defaultHourlyRate
     * @return self
     */
    public function setDefaultHourlyRate(float $defaultHourlyRate = null): self
    {
        $this->defaultHourlyRate = $defaultHourlyRate;

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
     * @return string[]
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param string[] $roles
     * @return self
     */
    public function setRoles(array $roles = null): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     * @return self
     */
    public function setAvatarUrl(string $avatarUrl = null): self
    {
        $this->avatarUrl = $avatarUrl;

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
     * @return self
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
     * @return self
     */
    public function setUpdatedAt(\DateTimeImmutable $updatedAt = null): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
