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

namespace FH\HarvestApiClient\Model\Invoice;

/**
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 */
class Invoice
{
    const STATE_OPEN = 'open';
    const STATE_PARTIAL = 'partial';
    const STATE_DRAFT = 'draft';
    const STATE_PAID = 'paid';
    const STATE_UNPAID = 'unpaid';
    const STATE_PAST_DUE = 'pastdue';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $clientKey;

    /**
     * @var \DateTimeImmutable
     */
    private $periodStart;

    /**
     * @var \DateTimeImmutable
     */
    private $periodEnd;

    /**
     * @var \DateTimeImmutable
     */
    private $issueDate;

    /**
     * @var \DateTimeImmutable
     */
    private $sentAt;

    /**
     * @var \DateTimeImmutable
     */
    private $dueDate;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var int
     */
    private $dueAmount;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var \DateTimeImmutable
     */
    private $updatedAt;

    /**
     * @var int
     */
    private $tax;

    /**
     * @var float
     */
    private $taxAmount;

    /**
     * @var int
     */
    private $tax2;

    /**
     * @var float
     */
    private $tax2Amount;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var InvoiceLine[]
     */
    private $lineItems = [];

    /**
     * @var string
     */
    private $number;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var float
     */
    private $discount;

    /**
     * @var float
     */
    private $discountAmount;

    public function __toString()
    {
        return (string) $this->getId();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    public function getClientKey(): ?string
    {
        return $this->clientKey;
    }

    public function setClientKey($clientKey): self
    {
        $this->clientKey = $clientKey;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client = null): self
    {
        $this->client = $client;
    }

    public function getPeriodStart(): ?\DateTimeImmutable
    {
        return $this->periodStart;
    }

    public function setPeriodStart(\DateTimeImmutable $periodStart = null): self
    {
        $this->periodStart = $periodStart;

        return $this;
    }

    public function getPeriodEnd(): ?\DateTimeImmutable
    {
        return $this->periodEnd;
    }

    public function setPeriodEnd(\DateTimeImmutable $periodEnd = null): self
    {
        $this->periodEnd = $periodEnd;

        return $this;
    }

    public function getIssueDate(): ?\DateTimeImmutable
    {
        return $this->issueDate;
    }

    public function setIssueDate(\DateTimeImmutable $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeImmutable $dueDate = null): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state = null): self
    {
        $this->state = $state;

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

    public function getDueAmount(): ?int
    {
        return $this->dueAmount;
    }

    public function setDueAmount(int $dueAmount = null): self
    {
        $this->dueAmount = $dueAmount;

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

    public function getSentAt(): ?\DateTimeImmutable
    {
        return $this->sentAt;
    }

    public function setSentAt(\DateTimeImmutable $sentAt = null): self
    {
        $this->sentAt = $sentAt;
    }

    public function isSent(): bool
    {
        return $this->sentAt instanceof \DateTimeImmutable && $this->sentAt < new \DateTimeImmutable();
    }

    public function getTax(): ?int
    {
        return $this->tax;
    }

    public function setTax(int $tax = null): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTaxAmount(): ?float
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(float $taxAmount = null): self
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    public function getTax2(): ?int
    {
        return $this->tax2;
    }

    public function setTax2(int $tax2 = null): self
    {
        $this->tax2 = $tax2;

        return $this;
    }

    public function getTax2Amount(): ?float
    {
        return $this->tax2Amount;
    }

    public function setTax2Amount(float $tax2Amount = null): self
    {
        $this->tax2Amount = $tax2Amount;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject = null): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number = null): self
    {
        $this->number = $number;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount = null): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getDiscountAmount(): ?float
    {
        return $this->discountAmount;
    }

    public function setDiscountAmount(float $discountAmount = null): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    public function setLineItems(array $lineItems): self
    {
        $this->lineItems = [];

        foreach ($lineItems as $line) {
            $this->addLine($line);
        }

        return $this;
    }

    public function addLine(InvoiceLine $line): self
    {
        if ($line->getKind() !== null) {
            $this->lineItems[] = $line->setInvoice($this);
        }

        return $this;
    }
}
