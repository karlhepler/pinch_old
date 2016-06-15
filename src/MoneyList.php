<?php

namespace Budget;

use Budget\Contracts\Collection;

class MoneyList implements Collection
{
    /**
     * The monies in the list
     *
     * @var array
     */
    protected $monies = [];

    /**
     * Money List
     *
     * @param array $monies
     */
    public function __construct(array $monies = [])
    {
        array_map([$this, 'pocket'], $monies);
    }

    /**
     * Return the number of transactions
     *
     * @return integer
     */
    public function count()
    {
        return count($this->monies);
    }

    /**
     * Pocket the money (add it to the list)
     *
     * @param  Money  $money
     * @return void
     */
    public function pocket(Money $money)
    {
        array_push($this->monies, $money);
    }

    /**
     * Calculate the sum of all of the monies
     *
     * @return Money
     */
    public function balance()
    {
        return array_reduce($this->monies,
            function(Money $total, Money $money) {
                return $total->add($money);
            }, new Money);
    }
}
