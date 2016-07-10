<?php

namespace App\Models\Split\Base\Traits;

use App\Pinch\Money;

trait AttributeMutators
{
    /**
     * Get the amount as money
     *
     * @param  integer $amount
     * @return \App\Pinch\Money
     */
    public function getAmountAttribute($amount)
    {
        return new Money($amount);
    }

    /**
     * Set the amount attribute
     *
     * @param mixed $amount
     */
    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = $amount instanceof Money
            ? $amount->value()
            : $amount;
    }
}
