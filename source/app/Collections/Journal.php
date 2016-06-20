<?php

namespace App\Collections;

use App\Collections\Abstracts\Register;

/**
 * The journal is the book of first entry.
 * In our case, it's a collection of transactions.
 * We can't use the concept exactly the same way we would
 * on paper, but the name can stick around.
 */
class Journal extends Register
{
    /**
     * Get the balance of this register
     *
     * @return \App\Money
     */
    public function balance()
    {
        //
    }
}