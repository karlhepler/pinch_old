<?php

namespace Budget;

class Money
{
    /**
     * An amount of money,
     * stored as total cents
     *
     * @var integer
     */
    protected $amount;

    /**
     * Money
     *
     * @param integer $amount
     */
    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    /**
     * Return just the dollars
     *
     * @return integer
     */
    public function dollars()
    {
        return (int)$this->amount();
    }

    /**
     * Return just the cents
     *
     * @return integer
     */
    public function cents()
    {
        return $this->rawAmount() % 100;
    }

    /**
     * Get the amount as a float
     *
     * @return float
     */
    public function amount()
    {
        return $this->rawAmount() / 100;
    }

    /**
     * Get the amount as it is
     *
     * @return integer
     */
    public function rawAmount()
    {
        return $this->amount;
    }

    /**
     * Render as a formatted string
     *
     * @return string
     */
    public function __toString()
    {
        return number_format($this->amount(), 2);
    }
}
