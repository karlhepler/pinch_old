<?php

namespace App\Models\Account\Abstracts;

abstract class DebitAccount extends Account
{
    /**
     * Add an entry to the account
     * and return the account balance
     *
     * @param  \App\Models\Entry\Abstracts\Entry  $entry
     * @return \App\Money
     */
    public function record(Entry $entry)
    {
        // A credit DECREASES the account balance
        // A debit INCREASES the account balance
    }
}