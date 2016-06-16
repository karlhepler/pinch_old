<?php

namespace OldTimeGuitarGuy\Budget\Money;

class Credit extends Money
{
    /**
     * Get the raw amount in cents
     *
     * @return signed integer
     */
    public function amount()
    {
        return $this->amount;
    }
}
