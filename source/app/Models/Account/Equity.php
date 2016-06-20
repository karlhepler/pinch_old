<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\CreditAccount;
use App\Models\Account\Contracts\BalanceSheetAccount;

/**
 * Equity is the net amount of funds invested in a business
 * by its owners, plus any retained earnings. It is also
 * calculated as the difference between the total of all
 * recorded assets and liabilities on an entity's balance sheet.
 */
class Equity extends CreditAccount implements BalanceSheetAccount
{
    /**
     * Create a new Equity instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'equity';
        parent::__construct($attributes);
    }
}