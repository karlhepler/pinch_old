<?php

namespace App\Factories;

use App\Collections\Splits;
use App\Models\Merchant\Merchant;

/**
 * This provides a fluid iterface for creating a transaction
 */
class TransactionRecord
{
    /**
     * Add an associated description to the transaction
     *
     * @param  string $description
     * @return $this
     */
    public function describedBy($description)
    {
        //
    }

    /**
     * State with whom this transaction is with
     *
     * @param  \App\Models\Merchant\Merchant $merchant
     * @return $this
     */
    public function with(Merchant $merchant)
    {
        //
    }

    /**
     * When this transaction took place
     *
     * @param  \DateTime $transactedAt
     * @return $this
     */
    public function on(\DateTime $transactedAt)
    {
        //
    }

    /**
     * A collection of splits for this transaction
     *
     * @param  Splits $splits
     * @return $this
     */
    public function havingSplits(Splits $splits)
    {
        //
    }

    /**
     * Record the transaction
     *
     * @return \App\Models\Transaction\Transaction
     */
    public function record()
    {
        // 
    }

    /**
     * This is here to catch a method call that starts with "and".
     * If it starts with "and", then that means we're done defining
     * the transaction and we're ready to actually create the transaction.
     *
     * @param  string $methodName
     * @param  array  $args
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call($methodName, array $args)
    {
        // If the method name starts with "and",
        // then we know it's over, so we need to save the transaction
    }
}