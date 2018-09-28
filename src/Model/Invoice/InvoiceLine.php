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

    public function __toString()
    {
        return $this->getKind() . ' - ' . $this->getDescription();
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     * @return self
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = floatval($quantity);

        return $this;
    }

    /**
     * @return int
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param int $unitPrice
     * @return self
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxed()
    {
        return $this->taxed;
    }

    /**
     * @param bool $taxed
     * @return self
     */
    public function setTaxed($taxed)
    {
        $this->taxed = $taxed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTaxed2()
    {
        return $this->taxed2;
    }

    /**
     * @param bool $taxed2
     * @return self
     */
    public function setTaxed2($taxed2)
    {
        $this->taxed2 = $taxed2;

        return $this;
    }
}
