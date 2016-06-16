<?php
/**
 * List of accounts of a particular type
 */

namespace OldTimeGuitarGuy\Budget;

class Ledger extends Book
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
        throw new \Exception('Method not implemented');
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
        throw new \Exception('Method not implemented');
    }
}
