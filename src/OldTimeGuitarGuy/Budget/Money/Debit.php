<?php

namespace OldTimeGuitarGuy\Budget\Money;

class Debit extends Money
{
    /**
     * Get the raw amount in cents
     *
     * @return signed integer
     */
    public function amount()
    {
        return -$this->amount;
    }
}
