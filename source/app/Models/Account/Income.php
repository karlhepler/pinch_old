<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\CreditAccount;
use App\Models\Account\Contracts\IncomeStatementAccount;

/**
 * Revenue is an increase in assets or decrease in liabilities
 * caused by the provision of services or products to customers.
 */
class Income extends CreditAccount implements IncomeStatementAccount
{
    //
}