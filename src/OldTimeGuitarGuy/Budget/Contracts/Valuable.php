<?php

namespace OldTimeGuitarGuy\Budget\Contracts;

interface Valuable
{
    /**
     * Get the raw value
     *
     * @return integer
     */
    public function value();
}