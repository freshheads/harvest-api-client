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

use JMS\Serializer\Annotation\Type;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class User
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $firstName;

    /**
     * @var
     */
    public $lastName;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $telephone;

    /**
     * @var
     */
    public $timezone;

    /**
     * @var
     */
    public $hasAccessToAllFutureProjects;

    /**
     * @var
     */
    public $isContractor;

    /**
     * @var
     */
    public $isAdmin;

    /**
     * @var
     */
    public $isProjectManager;

    /**
     * @var
     */
    public $canSeeRates;

    /**
     * @var
     */
    public $canCreateProjects;

    /**
     * @var
     */
    public $canCreateInvoices;

    /**
     * @var
     */
    public $isActive;

    /**
     * @var
     */
    public $weeklyCapacity;

    /**
     * @var
     */
    public $defaultHourlyRate;

    /**
     * @var
     */
    public $costRate;

    /**
     * @var
     */
    public $roles;

    /**
     * @var
     */
    public $avatarUrl;

    /**
     * @var
     */
    public $createdAt;

    /**
     * @var
     */
    public $updatedAt;

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * @return mixed
     */
    public function getHasAccessToAllFutureProjects()
    {
        return $this->hasAccessToAllFutureProjects;
    }

    /**
     * @param mixed $hasAccessToAllFutureProjects
     */
    public function setHasAccessToAllFutureProjects($hasAccessToAllFutureProjects): void
    {
        $this->hasAccessToAllFutureProjects = $hasAccessToAllFutureProjects;
    }

    /**
     * @return mixed
     */
    public function getisContractor()
    {
        return $this->isContractor;
    }

    /**
     * @param mixed $isContractor
     */
    public function setIsContractor($isContractor): void
    {
        $this->isContractor = $isContractor;
    }

    /**
     * @return mixed
     */
    public function getisAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getisProjectManager()
    {
        return $this->isProjectManager;
    }

    /**
     * @param mixed $isProjectManager
     */
    public function setIsProjectManager($isProjectManager): void
    {
        $this->isProjectManager = $isProjectManager;
    }

    /**
     * @return mixed
     */
    public function getCanSeeRates()
    {
        return $this->canSeeRates;
    }

    /**
     * @param mixed $canSeeRates
     */
    public function setCanSeeRates($canSeeRates): void
    {
        $this->canSeeRates = $canSeeRates;
    }

    /**
     * @return mixed
     */
    public function getCanCreateProjects()
    {
        return $this->canCreateProjects;
    }

    /**
     * @param mixed $canCreateProjects
     */
    public function setCanCreateProjects($canCreateProjects): void
    {
        $this->canCreateProjects = $canCreateProjects;
    }

    /**
     * @return mixed
     */
    public function getCanCreateInvoices()
    {
        return $this->canCreateInvoices;
    }

    /**
     * @param mixed $canCreateInvoices
     */
    public function setCanCreateInvoices($canCreateInvoices): void
    {
        $this->canCreateInvoices = $canCreateInvoices;
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
    public function getWeeklyCapacity()
    {
        return $this->weeklyCapacity;
    }

    /**
     * @param mixed $weeklyCapacity
     */
    public function setWeeklyCapacity($weeklyCapacity): void
    {
        $this->weeklyCapacity = $weeklyCapacity;
    }

    /**
     * @return mixed
     */
    public function getDefaultHourlyRate()
    {
        return $this->defaultHourlyRate;
    }

    /**
     * @param mixed $defaultHourlyRate
     */
    public function setDefaultHourlyRate($defaultHourlyRate): void
    {
        $this->defaultHourlyRate = $defaultHourlyRate;
    }

    /**
     * @return mixed
     */
    public function getCostRate()
    {
        return $this->costRate;
    }

    /**
     * @param mixed $costRate
     */
    public function setCostRate($costRate): void
    {
        $this->costRate = $costRate;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param mixed $avatarUrl
     */
    public function setAvatarUrl($avatarUrl): void
    {
        $this->avatarUrl = $avatarUrl;
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
}
