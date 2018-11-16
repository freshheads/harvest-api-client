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

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(string $kind = null): self
    {
        $this->kind = $kind;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity = null): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice = null): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function isTaxed(): ?bool
    {
        return $this->taxed;
    }

    public function setTaxed(bool $taxed = null): self
    {
        $this->taxed = $taxed;

        return $this;
    }

    public function isTaxed2(): ?bool
    {
        return $this->taxed2;
    }

    public function setTaxed2(bool $taxed2 = null): self
    {
        $this->taxed2 = $taxed2;

        return $this;
    }
}
