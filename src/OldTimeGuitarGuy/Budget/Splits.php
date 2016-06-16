<?php

namespace OldTimeGuitarGuy\Budget;

use OldTimeGuitarGuy\Budget\Money\Money;
use OldTimeGuitarGuy\Budget\Money\Credit;

class Splits extends Book
{
    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Get the balance of all of the elements in the book
     *
     * @return \OldTimeGuitarGuy\Budget\Money\Money
     */
    public function balance()
    {
        return $this->reduce(function(Money $carry, Split $current) {
            return $carry->sum($current->money());
        });
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Get the element type that this book accepts
     *
     * @return string
     */
    protected function elementType()
    {
        return Split::class;
    }
}
