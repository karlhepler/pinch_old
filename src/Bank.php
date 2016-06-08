<?php

namespace Budget;

use Budget\TransactionList;

class Bank
{
    /**
     * Transaction List
     *
     * @var TransactionList
     */
    protected $transactions;

    /**
     * Bank
     *
     * @param TransactionList|null $transactions
     */
    public function __construct(TransactionList $transactions = null)
    {
        $this->transactions = $transactions ?: new TransactionList;
    }

    /**
     * Get the transaction list
     *
     * @return TransactionList
     */
    public function transactions()
    {
        return $this->transactions;
    }
}
