<?php

namespace App\Models\Account\Base;

/**
 * A credit account's balance INCREASES when it is CREDITED
 * and DECREASES when it is DEBITED.
 */
class CreditAccount extends Account
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