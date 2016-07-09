<?php

namespace App\Models\Split;

use App\Models\Split\Debit;
use App\Contracts\HasContra;
use App\Models\Split\Base\Split;

/**
 * A split of itemization can credit an account.
 * Credit accounts that are credited yield a balance increase.
 * Debit accounts that are credited yield a balance decrease.
 */
class Credit extends Split implements HasContra
{
    /**
     * Get a copy of this,
     * instantiated by its contra class
     *
     * @return mixed
     */
    public function contra()
    {
        return new Debit($this->attributes);
    }
}
