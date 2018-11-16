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

    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName = null): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName = null): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email = null): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone = null): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone = null): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function isHasAccessToAllFutureProjects(): ?bool
    {
        return $this->hasAccessToAllFutureProjects;
    }

    public function setHasAccessToAllFutureProjects(bool $hasAccessToAllFutureProjects = null): self
    {
        $this->hasAccessToAllFutureProjects = $hasAccessToAllFutureProjects;

        return $this;
    }

    public function isContractor(): ?bool
    {
        return $this->isContractor;
    }

    public function setIsContractor(bool $isContractor = null): self
    {
        $this->isContractor = $isContractor;

        return $this;
    }

    public function isAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin = null): self
    {
        $this->isAdmin = $isAdmin;

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

    public function isCanSeeRates(): ?bool
    {
        return $this->canSeeRates;
    }

    public function setCanSeeRates(bool $canSeeRates = null): self
    {
        $this->canSeeRates = $canSeeRates;

        return $this;
    }

    public function isCanCreateProjects(): ?bool
    {
        return $this->canCreateProjects;
    }

    public function setCanCreateProjects(bool $canCreateProjects = null): self
    {
        $this->canCreateProjects = $canCreateProjects;

        return $this;
    }

    public function isCanCreateInvoices(): ?bool
    {
        return $this->canCreateInvoices;
    }

    public function setCanCreateInvoices(bool $canCreateInvoices = null): self
    {
        $this->canCreateInvoices = $canCreateInvoices;

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

    public function getWeeklyCapacity(): ?int
    {
        return $this->weeklyCapacity;
    }

    public function setWeeklyCapacity(int $weeklyCapacity = null): self
    {
        $this->weeklyCapacity = $weeklyCapacity;

        return $this;
    }

    public function getDefaultHourlyRate(): ?float
    {
        return $this->defaultHourlyRate;
    }

    public function setDefaultHourlyRate(float $defaultHourlyRate = null): self
    {
        $this->defaultHourlyRate = $defaultHourlyRate;

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

    /**
     * @return string[]
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param string[] $roles
     * @return User
     */
    public function setRoles(array $roles = null): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(string $avatarUrl = null): self
    {
        $this->avatarUrl = $avatarUrl;

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
