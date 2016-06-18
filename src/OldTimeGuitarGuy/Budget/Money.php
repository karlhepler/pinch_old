<?php

namespace OldTimeGuitarGuy\Budget;

use OldTimeGuitarGuy\Budget\Contracts\Valuable;

class Money implements Valuable
{
    /**
     * The raw value of the money
     *
     * @var integer
     */
    protected $value;

    /**
     * Money
     *
     * This is essentially what the whole thing is about.
     * The money knows its currency and its value can change
     * depending on the currency.
     *
     * @param integer $value
     */
    public function __construct($value = 0)
    {
        $this->value = $value;
    }

    /**
     * Get the raw value
     *
     * @return integer
     */
    public function value()
    {
        // @todo: This will eventually depend on the set currency
        return $this->value;
    }

    /**
     * Get the money's currency type
     *
     * @return string
     */
    public function currency()
    {
        return 'USD';
    }
}
