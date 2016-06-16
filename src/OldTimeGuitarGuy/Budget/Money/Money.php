<?php

namespace OldTimeGuitarGuy\Budget\Money;

abstract class Money
{
    /**
     * The raw amount of money
     * represented in total cents.
     *
     * @var unsigned integer
     */
    protected $amount;

    /**
     * Money
     *
     * @param integer $amount
     */
    public function __construct($amount = 0)
    {
        $this->amount = abs($amount);
    }

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Get the sum of this and another Money object
     *
     * @param  \OldTimeGuitarGuy\Budget\Money\Money  $money
     * @return \OldTimeGuitarGuy\Budget\Money\Money
     */
    public function sum(Money $money)
    {
        // Add the two together & get the result
        $result = $this->amount() + $money->amount();

        // If the result is negative, return Debit
        if ( $result < 0 ) {
            return new Debit($result);
        }

        // If it's positive, return Credit
        return new Credit($result); 
    }

    //////////////////////
    // ABSTRACT METHODS //
    //////////////////////

    /**
     * Get the raw amount in cents
     *
     * @return signed integer
     */
    abstract public function amount();
}
