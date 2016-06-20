<?php

namespace App\Models\Split;

use App\Models\Split\Abstracts\Split;

/**
 * A split of itemization can debit an account.
 * Credit accounts that are debited yield a balance decrease.
 * Debit accounts that are debited yield a balance increase.
 */
class Debit extends Split
{
    /**
     * Create a new Debit instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'debit';
        parent::__construct($attributes);
    }
}