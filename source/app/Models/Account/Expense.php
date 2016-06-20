<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\DebitAccount;
use App\Models\Account\Contracts\IncomeStatementAccount;

/**
 * An expense is an item of economic value that is expected to
 * be consumed within the current period.
 */
class Expense extends DebitAccount implements IncomeStatementAccount
{
    //
}