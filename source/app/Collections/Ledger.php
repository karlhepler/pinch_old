<?php

namespace App\Collections;

use App\Collections\Abstracts\Register;

/**
 * A ledger is the book of final entry.
 * After writing journal entries, we take
 * the itemized lines and group them by account
 * in the ledger, where we balance the accounts.
 * In our case, since the computer will be doing
 * all of this kind of automatically with how the relationships
 * are set up, we'll just consider this a collection of accounts.
 */
class Ledger extends Register
{
    /**
     * Get the balance of this register
     *
     * @return \App\Money
     */
    public function balance()
    {
        //
    }
}