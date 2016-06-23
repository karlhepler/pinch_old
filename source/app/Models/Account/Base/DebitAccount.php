<?php

namespace App\Models\Account\Base;

use App\Models\Split\Debit;
use App\Models\Split\Base\Split;
use App\Contracts\AdjustsNormalBalance;

/**
 * A debit account's balance DECREASES when it is CREDITED
 * and INCREASES when it is DEBITED.
 */
class DebitAccount extends Account implements AdjustsNormalBalance
{
    /**
     * Adjust the normal balance depending on the type of split
     *
     * @param  \App\Models\Split\Base\Split  $split
     * @return $this
     */
    public function adjustNormalBalance(Split $split)
    {
        $this->normal_balance = $split instanceof Debit
            ? $this->normal_balance->sum($split->amount)
            : $this->normal_balance->diff($split->amount);

        return $this;
    }
}