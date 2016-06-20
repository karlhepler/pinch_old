<?php

namespace App\Models\Account\Base;

/**
 * A debit account's balance DECREASES when it is CREDITED
 * and INCREASES when it is DEBITED.
 */
abstract class DebitAccount extends Account
{
}