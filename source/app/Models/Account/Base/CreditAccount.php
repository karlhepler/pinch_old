<?php

namespace App\Models\Account\Base;

use App\Models\Split\Debit;
use App\Models\Split\Credit;
use App\Contracts\UpdatesBalance;

/**
 * A credit account's balance INCREASES when it is CREDITED
 * and DECREASES when it is DEBITED.
 */
class CreditAccount extends Account implements UpdatesBalance
{
    const BALANCE_INCREASE = Credit::class;
    const BALANCE_DECREASE = Debit::class;
}