<?php

namespace App\Collections;

use App\Money;
use App\Models\Split\Credit;
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
        return $this->reduce(function($carry, $current) {
            return new Money($carry->value() + $current->value());
        }, new Money);
    }

    /**
     * Add a split that credits the given account
     * with the given amount of money
     *
     * @param  \App\Models\Account\Base\Account $account
     * @param  \App\Money   $amount
     * @return \App\Models\Split\Credit
     */
    public function credit(Account $account, Money $amount)
    {
        // Create the credit
        $credit = new Credit([
            'account_id' => $account->id,
            'amount' => $amount->value()
        ]);

        // Push it in
        $this->push($credit);

        // Return it
        return $credit;
    }

    /**
     * Add a split that debits the given account
     * with the given amount of money
     *
     * @param  \App\Models\Account\Base\Account $account
     * @param  \App\Money   $amount
     * @return \App\Models\Split\Debit
     */
    public function debit(Account $account, Money $amount)
    {
        // Create the debit
        $debit = new Debit([
            'account_id' => $account->id,
            'amount' => $amount->value()
        ]);

        // Push it in
        $this->push($debit);

        // Return it
        return $debit;
    }
}