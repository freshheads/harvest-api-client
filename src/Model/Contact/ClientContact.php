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

namespace FH\HarvestApiClient\Model\Contact;

use FH\HarvestApiClient\Model\Client\Client;

/**
 * @author Lars Janssen <lars.janssen@freshheads.com>
 */
class ClientContact
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phoneOffice;

    /**
     * @var string
     */
    private $phoneMobile;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var \DateTimeImmutable
     */
    private $updatetAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId = null): self
    {
        $this->clientId = $clientId;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title = null): self
    {
        $this->title = $title;

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

    public function getPhoneOffice(): ?string
    {
        return $this->phoneOffice;
    }

    public function setPhoneOffice(string $phoneOffice = null): self
    {
        $this->phoneOffice = $phoneOffice;

        return $this;
    }

    public function getPhoneMobile(): ?string
    {
        return $this->phoneMobile;
    }

    public function setPhoneMobile(string $phoneMobile = null): self
    {
        $this->phoneMobile = $phoneMobile;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax = null): self
    {
        $this->fax = $fax;

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

    public function getUpdatetAt(): ?\DateTimeImmutable
    {
        return $this->updatetAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatetAt = null): self
    {
        $this->updatetAt = $updatetAt;

        return $this;
    }
}
