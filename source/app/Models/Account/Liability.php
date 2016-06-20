<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\CreditAccount;
use App\Models\Account\Contracts\BalanceSheetAccount;

/**
 * A liability is a legally binding obligation payable to another entity.
 */
class Liability extends CreditAccount implements BalanceSheetAccount
{
    /**
     * Create a new Liability instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'liability';
        parent::__construct($attributes);
    }
}