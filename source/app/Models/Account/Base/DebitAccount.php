<?php

namespace App\Models\Account\Base;

use App\Models\Split\Debit;
use App\Models\Split\Credit;
use App\Contracts\UpdatesBalance;

/**
 * A debit account's balance DECREASES when it is CREDITED
 * and INCREASES when it is DEBITED.
 */
class DebitAccount extends Account implements UpdatesBalance
{
    const BALANCE_INCREASE = Debit::class;
    const BALANCE_DECREASE = Credit::class;
}
