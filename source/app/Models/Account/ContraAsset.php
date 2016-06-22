<?php

namespace App\Models\Account;

use App\Models\Account\Base\CreditAccount;

/**
 * A contra asset is a negative asset account that offsets
 * the balance in the asset account with which it is paired.
 */
class ContraAsset extends CreditAccount
{
    //
}