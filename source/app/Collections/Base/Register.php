<?php

namespace App\Collections\Base;

use Illuminate\Database\Eloquent\Collection;

/**
 * A register is a collection of valuable entries
 * that can return a balance.
 */
abstract class Register extends Collection
{
    /**
     * Get the balance of this register
     *
     * @return \App\Helpers\Money
     */
    abstract public function balance();

    /**
     * Determine if this register is balanced
     *
     * @return boolean
     */
    public function isBalanced()
    {
        return $this->balance()->value() === 0;
    }
}