<?php

namespace OldTimeGuitarGuy\Budget;

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
