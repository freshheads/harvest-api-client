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

    public function __construct(
        int $id,
        string $name,
        bool $billableByDefault,
        ?float $defaultHourlyRate,
        bool $isDefault,
        bool $isActive,
        \DateTimeImmutable $createdAt,
        \DateTimeImmutable $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->billableByDefault = $billableByDefault;
        $this->defaultHourlyRate = $defaultHourlyRate;
        $this->isDefault = $isDefault;
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBillableByDefault(): boolean
    {
        return $this->billableByDefault;
    }

    public function getDefaultHourlyRate(): ?float
    {
        return $this->defaultHourlyRate;
    }

    public function getIsDefault(): boolean
    {
        return $this->isDefault;
    }

    public function getIsActive(): boolean
    {
        return $this->isActive;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
