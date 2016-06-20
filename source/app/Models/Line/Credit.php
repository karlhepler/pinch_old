<?php

namespace App\Models\Line;

use App\Models\Line\Abstracts\Line;

/**
 * A line of itemization can credit an account.
 * Credit accounts that are credited yield a balance increase.
 * Debit accounts that are credited yield a balance decrease.
 */
class Credit extends Line
{
    //
}