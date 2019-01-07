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

namespace FH\HarvestApiClient\Model\Task;

final class Task
{
    private $id;
    private $name;
    private $billableByDefault;
    private $defaultHourlyRate;
    private $isDefault;
    private $isActive;
    private $createdAt;
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBillableByDefault(): ?bool
    {
        return $this->billableByDefault;
    }

    public function setBillableByDefault(bool $billableByDefault): void
    {
        $this->billableByDefault = $billableByDefault;
    }

    public function getDefaultHourlyRate(): ?float
    {
        return $this->defaultHourlyRate;
    }

    public function setDefaultHourlyRate(float $defaultHourlyRate)
    {
        $this->defaultHourlyRate = $defaultHourlyRate;
    }

    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): void
    {
        $this->isDefault = $isDefault;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
