<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\DebitAccount;
use App\Models\Account\Contracts\BalanceSheetAccount;

/**
 * An asset is an item of economic value that is expected
 * to yield a benefit to the owning entity in future periods.
 */
class Asset extends DebitAccount implements BalanceSheetAccount
{
    //
}