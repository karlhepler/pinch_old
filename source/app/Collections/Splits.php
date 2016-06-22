<?php

namespace App\Collections;

use App\Money;
use App\Models\Split\Debit;
use App\Models\Split\Credit;
use App\Models\Split\Base\Split;
use App\Models\Account\Base\Account;
use App\Collections\Abstracts\Register;

/**
 * I don't really know what to call this.
 * I don't think there is a name. In journal entries,
 * you itemize the accounts that are affected by
 * the transaction. Each itemization is done on a new line.
 * You then take this exact same information and write it
 * line-by-line in the ledger under the appropriate accounts.
 * That's how I came up with the word line. Yay. What is a collection
 * of lines called? Splits. Yep. Brilliant, I know. I know... I know.
 */
class Splits extends Register
{
    /**
     * Get the balance of this register
     *
     * @return \App\Money
     */
    public function balance()
    {
        return $this->reduce(function(Money $carry, Split $current) {
            return $current instanceof Debit
                ? $carry->sum($current->amount)
                : $carry->diff($current->amount);
        }, new Money);
    }
}