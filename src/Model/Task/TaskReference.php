<?php
declare(strict_types=1);

namespace FH\HarvestApiClient\Model\Task;

final class TaskReference
{
    private $id;
    private $name;

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
}
