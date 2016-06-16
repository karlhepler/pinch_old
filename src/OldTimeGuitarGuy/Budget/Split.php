<?php
/**
 * aka. Ledger Entry
 * Contains amount (money), pointer to single transaction, pointer to single debited account,
 * reconciled flag, & timestamp
 */

namespace OldTimeGuitarGuy\Budget;

use OldTimeGuitarGuy\Budget\Account;
use OldTimeGuitarGuy\Budget\Transaction;
use OldTimeGuitarGuy\Budget\Money\Money;

class Split
{
    /**
     * The split's money
     *
     * @var \OldTimeGuitarGuy\Budget\Money\Money
     */
    protected $money;

    /**
     * The split's transaction
     *
     * @var \OldTimeGuitarGuy\Budget\Transaction
     */
    protected $transaction;

    /**
     * The split's account
     *
     * @var \OldTimeGuitarGuy\Budget\Account
     */
    protected $account;

    /**
     * Split (aka. Ledger Entry)
     *
     * @param \OldTimeGuitarGuy\Budget\Money\Money $money
     * @param \OldTimeGuitarGuy\Budget\Transaction $transaction
     * @param \OldTimeGuitarGuy\Budget\Account     $account
     */
    public function __construct(Money $money, Transaction $transaction, Account $account)
    {
        $this->money = $money;
        $this->transaction = $transaction;
        $this->account = $account;
    }

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Get the split's money
     *
     * @return \OldTimeGuitarGuy\Budget\Money\Money
     */
    public function money()
    {
        return $this->money;
    }

    /**
     * Get the split's transaction
     *
     * @return \OldTimeGuitarGuy\Budget\Transaction
     */
    public function transaction()
    {
        return $this->transaction;
    }

    /**
     * Get the split's account
     *
     * @return \OldTimeGuitarGuy\Budget\Account
     */
    public function account()
    {
        return $this->account;
    }
}
