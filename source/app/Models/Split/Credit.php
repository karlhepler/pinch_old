<?php

namespace App\Models\Split;

use App\Models\Split\Base\Split;

/**
 * A split of itemization can credit an account.
 * Credit accounts that are credited yield a balance increase.
 * Debit accounts that are credited yield a balance decrease.
 */
class Credit extends Split
{
    protected static $singleTableType = 'credit';
}