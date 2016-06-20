<?php

namespace App\Models\Account\Abstracts;

/**
 * A debit account's balance DECREASES when it is CREDITED
 * and INCREASES when it is DEBITED.
 */
abstract class DebitAccount extends Account
{
}