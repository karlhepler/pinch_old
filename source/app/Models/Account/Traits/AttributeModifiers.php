<?php

namespace App\Models\Account\Traits;

use App\Helpers\Money;

trait AttributeModifiers
{
    /**
     * Get the normal balance as money
     *
     * @param  integer $normalBalance
     * @return \App\Helpers\Money
     */
    public function getNormalBalanceAttribute($normalBalance)
    {
        return new Money($normalBalance);
    }

    /**
     * Get the value of the normal balance if it's Money
     *
     * @param mixed $normalBalance
     */
    public function setNormalBalanceAttribute($normalBalance)
    {
        if ( $normalBalance instanceof Money ) {
            $this->attributes['normal_balance'] = $normalBalance->value();
            return;
        }

        $this->attributes['normal_balance'] = $normalBalance;
    }
}