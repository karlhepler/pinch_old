<?php

namespace App\Models\Line;

use App\Models\Line\Abstracts\Line;

/**
 * A line of itemization can debit an account.
 * Credit accounts that are debited yield a balance decrease.
 * Debit accounts that are debited yield a balance increase.
 */
class Debit extends Line
{
    //
}