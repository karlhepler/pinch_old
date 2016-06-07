<?php

namespace Budget;

use DateTime;

class Transaction
{
    /**
     * The money that was transacted
     *
     * @var Money
     */
    protected $money;

    /**
     * The datetime of the transaction
     *
     * @var DateTime
     */
    protected $transactedAt;

    /**
     * A monetary transaction
     *
     * @param Money    $money
     * @param DateTime $transactedAt
     */
    public function __construct(Money $money, DateTime $transactedAt)
    {
        $this->money = $money;
        $this->transactedAt = $transactedAt;
    }

    /**
     * Get the money
     *
     * @return Money
     */
    public function money()
    {
        return $this->money;
    }

    /**
     * Get the datetime of the transaction
     *
     * @return DateTime
     */
    public function transactedAt()
    {
        return $this->transactedAt;
    }
}
