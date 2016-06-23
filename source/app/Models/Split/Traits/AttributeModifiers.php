<?php

namespace App\Models\Split\Traits;

use App\Helpers\Money;

trait AttributeModifiers
{
    /**
     * Get the amount as money
     *
     * @param  integer $amount
     * @return \App\Helpers\Money
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