<?php

namespace App\Helpers;

class Money
{
    /**
     * The raw value
     *
     * @var integer
     */
    protected $value;

    /**
     * Money
     *
     * @param integer $value
     */
    public function __construct($value = 0)
    {
        $this->value = intval($value);
    }

    /**
     * Get the raw value
     *
     * @return integer
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Return the sum of this and other Money
     *
     * @param  \App\Helpers\Money  $money
     * @return \App\Helpers\Money
     */
    public function sum(Money $money)
    {
        return new Money(
            $this->value() + $money->value()
        );
    }

    /**
     * Return the difference of this and other Money
     *
     * @param  \App\Helpers\Money  $money
     * @return \App\Helpers\Money
     */
    public function diff(Money $money)
    {
        return new Money(
            $this->value() - $money->value()
        );
    }

    /**
     * Determine if the value is negative
     *
     * @return boolean
     */
    public function isNegative()
    {
        return $this->value() < 0;
    }

    /**
     * Determine if the value is positive
     *
     * @return boolean
     */
    public function isPositive()
    {
        return !$this->isNegative();
    }

    /**
     * Return Money of absolute value of this
     *
     * @return \App\Helpers\Money
     */
    public function abs()
    {
        return new Money(abs($this->value()));
    }

    /**
     * Convert the value to a string
     *
     * @return string
     */
    public function __toString()
    {
        return substr_replace(str_pad(strval($this->value()), 4, '0', STR_PAD_RIGHT), '.', -2, 0);
    }
}