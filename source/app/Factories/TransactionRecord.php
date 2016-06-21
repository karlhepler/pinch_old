<?php

namespace App\Factories;

use App\Models\Merchant\Merchant;

/**
 * This provides a fluid iterface for creating a transaction
 */
class TransactionRecord
{
    /**
     * Describe what this is a transasction of
     *
     * @param  string $description
     * @return $this
     */
    public function of($description)
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
     * An array of credits to accounts for this transaction
     * ex: ['amount' => 12300, 'account' => <\App\Models\Account\Base\Account>$account]
     *
     * @param  array  $credits
     * @return $this
     */
    public function havingCredits(array $credits)
    {
        //
    }

    /**
     * An array of debits to accounts for this transaction
     * ex: ['amount' => 12300, 'account' => <\App\Models\Account\Base\Account>$account]
     *
     * @param  array  $debits
     * @return $this
     */
    public function havingDebits(array $debits)
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