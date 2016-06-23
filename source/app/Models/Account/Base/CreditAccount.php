<?php

namespace App\Models\Account\Base;

use App\Models\Split\Credit;
use App\Models\Split\Base\Split;
use App\Contracts\AdjustsNormalBalance;

/**
 * A credit account's balance INCREASES when it is CREDITED
 * and DECREASES when it is DEBITED.
 */
class CreditAccount extends Account implements AdjustsNormalBalance
{
    /**
     * Adjust the normal balance depending on the type of split
     *
     * @param  \App\Models\Split\Base\Split  $split
     * @return $this
     */
    public function adjustNormalBalance(Split $split)
    {
        $this->normal_balance = $split instanceof Credit
            ? $this->normal_balance->sum($split->amount)
            : $this->normal_balance->diff($split->amount);

        return $this;
    }
}