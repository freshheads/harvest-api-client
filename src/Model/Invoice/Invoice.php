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

    /**
     * @return int
     */
    public function getId(): int
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
    public function getClientKey(): ?string
    {
        return $this->clientKey;
    }

    /**
     * @param string $clientKey
     * @return self
     */
    public function setClientKey($clientKey): self
    {
        $this->clientKey = $clientKey;

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
     */
    public function setClient(Client $client = null): self
    {
        $this->client = $client;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getPeriodStart(): ?\DateTimeImmutable
    {
        return $this->periodStart;
    }

    /**
     * @param \DateTimeImmutable $periodStart
     * @return self
     */
    public function setPeriodStart(\DateTimeImmutable $periodStart = null): self
    {
        $this->periodStart = $periodStart;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getPeriodEnd(): ?\DateTimeImmutable
    {
        return $this->periodEnd;
    }

    /**
     * @param \DateTimeImmutable $periodEnd
     * @return self
     */
    public function setPeriodEnd(\DateTimeImmutable $periodEnd = null): self
    {
        $this->periodEnd = $periodEnd;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getIssueDate(): ?\DateTimeImmutable
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeImmutable $issueDate
     * @return self
     */
    public function setIssueDate(\DateTimeImmutable $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTimeImmutable $dueDate
     * @return self
     */
    public function setDueDate(\DateTimeImmutable $dueDate = null): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return self
     */
    public function setAmount(float $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return self
     */
    public function setState(string $state = null): self
    {
        $this->state = $state;

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
     * @return self
     */
    public function setNotes(string $notes = null): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return int
     */
    public function getDueAmount(): ?int
    {
        return $this->dueAmount;
    }

    /**
     * @param int $dueAmount
     * @return self
     */
    public function setDueAmount(int $dueAmount = null): self
    {
        $this->dueAmount = $dueAmount;

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

    /**
     * @return \DateTimeImmutable
     */
    public function getSentAt(): ?\DateTimeImmutable
    {
        return $this->sentAt;
    }

    /**
     * @param \DateTimeImmutable $sentAt
     */
    public function setSentAt(\DateTimeImmutable $sentAt = null): self
    {
        $this->sentAt = $sentAt;
    }

    public function isSent(): bool
    {
        return $this->sentAt instanceof \DateTimeImmutable && $this->sentAt < new \DateTimeImmutable();
    }

    /**
     * @return int
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * @param int $tax
     * @return self
     */
    public function setTax(int $tax = null): self
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount(): ?float
    {
        return $this->taxAmount;
    }

    /**
     * @param float $taxAmount
     * @return self
     */
    public function setTaxAmount(float $taxAmount = null): self
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTax2(): ?int
    {
        return $this->tax2;
    }

    /**
     * @param int $tax2
     * @return self
     */
    public function setTax2(int $tax2 = null): self
    {
        $this->tax2 = $tax2;

        return $this;
    }

    /**
     * @return float
     */
    public function getTax2Amount(): ?float
    {
        return $this->tax2Amount;
    }

    /**
     * @param float $tax2Amount
     * @return self
     */
    public function setTax2Amount(float $tax2Amount = null): self
    {
        $this->tax2Amount = $tax2Amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return self
     */
    public function setSubject(string $subject = null): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number = null): self
    {
        $this->number = $number;
    }

    /**
     * @return float
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount = null): self
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return float
     */
    public function getDiscountAmount(): ?float
    {
        return $this->discountAmount;
    }

    /**
     * @param float $discountAmount
     */
    public function setDiscountAmount(float $discountAmount = null): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

     /**
     * @return InvoiceLine[]
     */
    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    /**
     * @param InvoiceLine[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        $this->lineItems = [];

        foreach ($lineItems as $line) {
            $this->addLine($line);
        }

        return $this;
    }

    /**
     * @param InvoiceLine $line
     * @return self
     */
    public function addLine(InvoiceLine $line): self
    {
        if ($line->getKind() !== null) {
            $this->lineItems[] = $line->setInvoice($this);
        }

        return $this;
    }
}
