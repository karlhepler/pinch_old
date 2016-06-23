<?php

namespace App\Models\Account\Traits;

use App\Helpers\Money;

trait AttributeModifiers
{
    /**
     * Get the balance as money
     *
     * @param  integer $balance
     * @return \App\Helpers\Money
     */
    public function getBalanceAttribute($balance)
    {
        return new Money($balance);
    }

    /**
     * Get the value of the balance if it's Money
     *
     * @param mixed $balance
     */
    public function setBalanceAttribute($balance)
    {
        $this->attributes['balance'] = $balance instanceof Money
            ? $balance->value()
            : $balance;
    }
    
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
        $this->attributes['normal_balance'] = $normalBalance instanceof Money
            ? $normalBalance->value()
            : $normalBalance;
    }

    /**
     * Get the negative balance as money
     *
     * @param  integer $negativeBalance
     * @return \App\Helpers\Money
     */
    public function getNegativeBalanceAttribute($negativeBalance)
    {
        return new Money($negativeBalance);
    }

    /**
     * Get the value of the negative balance if it's Money
     *
     * @param mixed $negativeBalance
     */
    public function setNegativeBalanceAttribute($negativeBalance)
    {
        $this->attributes['negative_balance'] = $negativeBalance instanceof Money
            ? $negativeBalance->value()
            : $negativeBalance;
    }
}