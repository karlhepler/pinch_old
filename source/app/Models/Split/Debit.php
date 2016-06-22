<?php

namespace App\Models\Split;

use App\Contracts\HasContra;
use App\Models\Split\Credit;
use App\Models\Split\Base\Split;

/**
 * A split of itemization can debit an account.
 * Credit accounts that are debited yield a balance decrease.
 * Debit accounts that are debited yield a balance increase.
 */
class Debit extends Split implements HasContra
{
    /**
     * Get a copy of this,
     * instantiated by its contra class
     *
     * @return mixed
     */
    public function contra()
    {
        return new Credit($this->attributes);
    }
}