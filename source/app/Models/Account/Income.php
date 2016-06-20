<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\CreditAccount;

/**
 * Revenue is an increase in assets or decrease in liabilities
 * caused by the provision of services or products to customers.
 */
class Income extends CreditAccount
{
    /**
     * Create a new Income instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'income';
        parent::__construct($attributes);
    }
}