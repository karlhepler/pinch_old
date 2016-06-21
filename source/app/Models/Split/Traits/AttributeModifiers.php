<?php

namespace App\Models\Split\Traits;

use App\Money;

trait AttributeModifiers
{
    /**
     * Get the amount as money
     *
     * @param  integer $amount
     * @return \App\Money
     */
    public function getAmountAttribute($amount)
    {
        return new Money($amount);
    }
}