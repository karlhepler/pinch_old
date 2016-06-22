<?php

namespace App\Collections\Abstracts;

use Illuminate\Support\Collection;

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
}