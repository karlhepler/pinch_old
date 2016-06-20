<?php

namespace App\Factories;

use App\Models\Merchant\Merchant;

/**
 * This provides a fluid iterface for creating a transaction
 */
class TransactionRecord
{
    public function __construct($description = '')
    {
        //
    }

    public function with(Merchant $merchant)
    {
        //
    }

    public function on(\DateTime $transactedAt)
    {
        //
    }

    public function havingCredits(array $credits)
    {
        //
    }

    public function havingDebits(array $debits)
    {
        //
    }

    public function __call($methodName, array $args)
    {
        // If the method name starts with "and",
        // then we know it's over, so we need to save the transaction
    }
}