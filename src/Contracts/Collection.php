<?php

namespace Budget\Contracts;

interface Collection
{
    /**
     * Return the number of transactions
     *
     * @return integer
     */
    public function count();
}