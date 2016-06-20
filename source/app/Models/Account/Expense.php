<?php

namespace App\Models\Account;

use App\Models\Account\Base\DebitAccount;

/**
 * An expense is an item of economic value that is expected to
 * be consumed within the current period.
 */
class Expense extends DebitAccount
{
    protected static $singleTableType = 'expense';
}