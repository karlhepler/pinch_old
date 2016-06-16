<?php
/**
 * aka. Ledger Entry
 * Contains amount (money), pointer to single transaction, pointer to single debited account,
 * reconciled flag, & timestamp
 */

namespace OldTimeGuitarGuy\Budget;

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
     * The split's memo
     *
     * @var string
     */
    protected $memo;

    /**
     * The split's reconciliation status
     *
     * @var boolean
     */
    protected $isReconciled;

    /**
     * Split (aka. Ledger Entry)
     *
     * @param \OldTimeGuitarGuy\Budget\Money\Money $money
     * @param \OldTimeGuitarGuy\Budget\Transaction $transaction
     * @param \OldTimeGuitarGuy\Budget\Account     $account
     * @param string $memo
     * @param boolean $isReconciled
     */
    public function __construct(Money $money, Transaction $transaction, Account $account, $memo = '', $isReconciled = false)
    {
        $this->money = $money;
        $this->transaction = $transaction;
        $this->account = $account;
        $this->memo = $memo;
        $this->isReconciled = $isReconciled;
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

    /**
     * Get the split's memo
     *
     * @return string
     */
    public function memo()
    {
        return $this->memo;
    }

    /**
     * Determine if the split is reconciled
     *
     * @return boolean
     */
    public function isReconciled()
    {
        return $this->isReconciled;
    }

    /**
     * Reconcile the split
     *
     * @return boolean
     */
    public function reconcile()
    {
        return $this->isReconciled = true;
    }

    /**
     * Unreconcile the split
     *
     * @return boolean
     */
    public function unreconcile()
    {
        return $this->isReconciled = false;
    }
}
