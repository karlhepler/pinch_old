<?php

namespace App\Contracts;

use App\Models\Split\Base\Split;

interface UpdatesBalance
{
    /**
     * Adjust the balance, normal balance, & negative balance
     * based on the kind of split
     *
     * @param  \App\Models\Split\Base\Split  $split
     * @return $this
     */
    public function updateBalance(Split $split);
}