<?php

namespace App\Models\Account;

use App\Models\Account\Abstracts\CreditAccount;

/**
 * A contra asset is a negative asset account that offsets
 * the balance in the asset account with which it is paired.
 */
class ContraAsset extends CreditAccount
{
    /**
     * Create a new ContraAsset instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'contra_asset';
        parent::__construct($attributes);
    }
}