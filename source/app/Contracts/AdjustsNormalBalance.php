<?php

namespace App\Contracts;

use App\Models\Split\Base\Split;

interface AdjustsNormalBalance
{
    /**
     * Adjust the normal balance depending on the type of split
     *
     * @param  \App\Models\Split\Base\Split  $split
     * @return $this
     */
    public function adjustNormalBalance(Split $split);
}