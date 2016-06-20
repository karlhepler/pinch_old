<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\CreditAccount;
use App\Models\Account\Contracts\BalanceSheetAccount;

/**
 * A contra asset is a negative asset account that offsets
 * the balance in the asset account with which it is paired.
 */
class Asset extends CreditAccount implements BalanceSheetAccount
{
    //
}