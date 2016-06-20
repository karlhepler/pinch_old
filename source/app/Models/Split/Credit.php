<?php

namespace App\Models\Split;

use App\Models\Split\Abstracts\Split;

/**
 * A split of itemization can credit an account.
 * Credit accounts that are credited yield a balance increase.
 * Debit accounts that are credited yield a balance decrease.
 */
class Credit extends Split
{
    /**
     * Create a new Credit instance
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $attributes['type'] = 'credit';
        parent::__construct($attributes);
    }
}