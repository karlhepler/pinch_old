<?php

namespace App\Models\Account\Base;

use App\Models\Split\Credit;
use App\Models\Split\Base\Split;
use App\Contracts\UpdatesBalance;

/**
 * A credit account's balance INCREASES when it is CREDITED
 * and DECREASES when it is DEBITED.
 */
class CreditAccount extends Account implements UpdatesBalance
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
        if ( $split instanceof Credit ) {
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