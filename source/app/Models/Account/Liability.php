<?php

namespace App\Models\Account;

use App\Models\Account\Base\CreditAccount;

/**
 * A liability is a legally binding obligation payable to another entity.
 */
class Liability extends CreditAccount
{
    protected static $singleTableType = 'liability';
}