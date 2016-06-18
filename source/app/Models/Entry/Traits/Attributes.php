<?php

namespace App\Models\Entry\Traits;

use App\Money;

trait Attributes
{
    /**
     * Get the transaction amount
     *
     * @param  integer $amount
     * @return \App\Money
     */
    public function getAmountAttribute($amount)
    {
        return new Money($amount);
    }
}