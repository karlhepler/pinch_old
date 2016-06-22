<?php

namespace App\Models\Account\Base;

/**
 * A debit account's balance DECREASES when it is CREDITED
 * and INCREASES when it is DEBITED.
 */
class DebitAccount extends Account
{
    /**
     * Get the normal balance of this account
     *
     * Accounts have normal balances on the side where the increases in such accounts are recorded.
     * Accounts are reported on the sides where they have normal balances.
     *
     * @return \App\Helpers\Money
     */
    public function normalBalance()
    {
        //
    }
}