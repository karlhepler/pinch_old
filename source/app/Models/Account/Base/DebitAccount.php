<?php

namespace App\Models\Account\Base;

use App\Models\Split\Debit;
use App\Models\Split\Base\Split;
use App\Contracts\UpdatesBalance;

/**
 * A debit account's balance DECREASES when it is CREDITED
 * and INCREASES when it is DEBITED.
 */
class DebitAccount extends Account implements UpdatesBalance
{
    /**
     * Adjust the balance, normal balance, & negative balance
     * based on the kind of split
     *
     * @param  \App\Models\Split\Base\Split  $split
     * @return $this
     */
    public function updateBalance(Split $split)
    {
        if ( $split instanceof Debit ) {
            $this->balance = $this->balance->sum($split->amount);
            $this->normal_balance = $this->normal_balance->sum($split->amount);
        }
        else {
            $this->balance = $this->balance->diff($split->amount);
            $this->negative_balance = $this->negative_balance->sum($split->amount);
        }

        return $this;
    }
}