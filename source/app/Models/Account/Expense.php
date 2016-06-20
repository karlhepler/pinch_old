<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\DebitAccount;

/**
 * An expense is an item of economic value that is expected to
 * be consumed within the current period.
 */
class Expense extends DebitAccount
{
    /**
     * Create a new Expense instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'expense';
        parent::__construct($attributes);
    }
}