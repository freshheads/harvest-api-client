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
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 * @author Kevin Schuurmans <kevin.schuurmans@freshheads.com>
 */
class InvoiceLine
{
    /**
     * @var string
     */
    private $kind;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var float
     */
    private $unitPrice;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var bool
     */
    private $taxed;

    /**
     * @var bool
     */
    private $taxed2;

    public function __toString(): string
    {
        return $this->getKind() . ' - ' . $this->getDescription();
    }

    /**
     * @return string
     */
    public function getKind(): ?string
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     * @return self
     */
    public function setKind(string $kind = null): self
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     * @return self
     */
    public function setUnitPrice(float $unitPrice = null): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxed(): ?bool
    {
        return $this->taxed;
    }

    /**
     * @param bool $taxed
     * @return self
     */
    public function setTaxed(bool $taxed = null): self
    {
        $this->taxed = $taxed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxed2(): ?bool
    {
        return $this->taxed2;
    }

    /**
     * @param bool $taxed2
     * @return self
     */
    public function setTaxed2(bool $taxed2 = null): self
    {
        $this->taxed2 = $taxed2;

        return $this;
    }
}
