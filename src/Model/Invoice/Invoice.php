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

use JMS\Serializer\Annotation\Type;
use FH\HarvestApiClient\Model\Client\Client;

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
     * @Type("int")
     */
    public $id;

    /**
     * @Type("string")
     */
    public $clientKey;

    /**
     * @Type("int")
     */
    public $periodStart;

    /**
     * @Type("DateTimeImmutable")
     */
    public $periodEnd;

    /**
     * @Type("DateTimeImmutable")
     */
    public $issueDate;

    /**
     * @Type("DateTimeImmutable")
     */
    public $sentAt;

    /**
     * @Type("DateTimeImmutable")
     */
    public $dueDate;

    /**
     * @Type("double")
     */
    public $amount;

    /**
     * @Type("string")
     */
    public $state;

    /**
     * @Type("string")
     */
    public $notes;

    /**
     * @Type("double")
     */
    public $dueAmount;

    /**
     * @Type("DateTimeImmutable")
     */
    public $createdAt;

    /**
     * @Type("DateTimeImmutable")
     */
    public $updatedAt;

    /**
     * @Type("double")
     */
    public $tax;

    /**
     * @Type("double")
     */
    public $taxAmount;

    /**
     * @Type("double")
     */
    public $tax2;

    /**
     * @Type("double")
     */
    public $tax2Amount;

    /**
     * @Type("string")
     */
    public $subject;

    /**
     * @Type("string")
     */
    public $lineItems = [];

    /**
     * @Type("double")
     */
    public $number;

    /**
     * @Type("string")
     */
    public $client;

    /**
     * @Type("double")
     */
    public $discount;

    /**
     * @Type("double")
     */
    public $discountAmount;
    
    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientKey()
    {
        return $this->clientKey;
    }

    /**
     * @param string $clientKey
     * @return self
     */
    public function setClientKey($clientKey)
    {
        $this->clientKey = $clientKey;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodStart()
    {
        return $this->periodStart;
    }

    /**
     * @param \DateTimeInterface $periodStart
     * @return self
     */
    public function setPeriodStart(\DateTimeInterface $periodStart = null)
    {
        $this->periodStart = $periodStart;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodEnd()
    {
        return $this->periodEnd;
    }

    /**
     * @param \DateTimeInterface $periodEnd
     * @return self
     */
    public function setPeriodEnd(\DateTimeInterface $periodEnd)
    {
        $this->periodEnd = $periodEnd;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface $issueDate
     * @return self
     */
    public function setIssueDate(\DateTimeInterface $issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTimeInterface $dueDate
     * @return self
     */
    public function setDueDate(\DateTimeInterface $dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return int
     */
    public function getDueAmount()
    {
        return $this->dueAmount;
    }

    /**
     * @param int $dueAmount
     * @return self
     */
    public function setDueAmount($dueAmount)
    {
        $this->dueAmount = $dueAmount;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     * @return self
     */
    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface $updatedAt
     * @return self
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * @param \DateTimeInterface $sentAt
     */
    public function setSentAt(\DateTimeInterface $sentAt)
    {
        $this->sentAt = $sentAt;
    }

    public function isSent()
    {
        return $this->sentAt instanceof \DateTimeInterface && $this->sentAt < new \DateTimeImmutable();
    }

    /**
     * @return int
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param int $tax
     * @return self
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @param float $taxAmount
     * @return self
     */
    public function setTaxAmount($taxAmount)
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getTax2()
    {
        return $this->tax2;
    }

    /**
     * @param int $tax2
     * @return self
     */
    public function setTax2($tax2)
    {
        $this->tax2 = $tax2;
        return $this;
    }

    /**
     * @return float
     */
    public function getTax2Amount()
    {
        return $this->tax2Amount;
    }

    /**
     * @param float $tax2Amount
     * @return self
     */
    public function setTax2Amount($tax2Amount)
    {
        $this->tax2Amount = $tax2Amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
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
    public function setDiscount(float $discount = null): void
    {
        $this->discount = $discount;
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
    public function setDiscountAmount(float $discountAmount = null): void
    {
        $this->discountAmount = $discountAmount;
    }

    /**
     * @return array
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * @param array $lineItems
     * @return self
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = [];
        foreach ($lineItems as $line) {
            $this->addLine($line);
        }
        return $this;
    }

    /**
     * @param Line $line
     * @return self
     */
    public function addLine(Line $line)
    {
        if ($line->getKind() !== null) {
            $this->lineItems[] = $line->setInvoice($this);
        }
        return $this;
    }
}

