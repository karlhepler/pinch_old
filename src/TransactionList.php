<?php

namespace Budget;

use Budget\Transaction;

class TransactionList
{
    /**
     * The transactions
     *
     * @var array
     */
    protected $transactions = [];

    /**
     * Transaction List
     *
     * @param array $transactions
     */
    public function __construct(array $transactions = [])
    {
        array_map([$this, 'record'], $transactions);
    }

    /**
     * Return the number of transactions
     *
     * @return integer
     */
    public function count()
    {
        return count($this->transactions);
    }

    /**
     * Record a transaction
     *
     * @param  Transaction $transaction
     * @return void
     */
    public function record(Transaction $transaction)
    {
        array_push($this->transactions, $transaction);
    }

    /**
     * Calculate the sum of all transactions
     *
     * @return Money
     */
    public function sum()
    {
        return array_reduce($this->transactions,
            function(Money $total, Transaction $transaction) {
                return $total->add($transaction->money());
            }, new Money);
    }
}
