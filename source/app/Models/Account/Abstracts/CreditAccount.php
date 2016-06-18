<?php

namespace App\Models\Account\Abstracts;

abstract class CreditAccount extends Account
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
        // A credit INCREASES the account balance
        // A debit DECREASES the account balance
    }
}