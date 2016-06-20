<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\DebitAccount;
use App\Models\Account\Contracts\BalanceSheetAccount;

/**
 * An asset is an item of economic value that is expected
 * to yield a benefit to the owning entity in future periods.
 */
class Asset extends DebitAccount implements BalanceSheetAccount
{
    /**
     * Create a new Asset instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'asset';
        parent::__construct($attributes);
    }
}