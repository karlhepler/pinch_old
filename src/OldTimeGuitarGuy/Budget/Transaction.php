<?php
/**
 * A transaction contains the transaction date, desc, id, and a list of splits
 * The sum of all the splits must be 0
 * One split might be the credited account (+)
 * One split might be the debited account (-)
 */

namespace OldTimeGuitarGuy\Budget;

class Transaction
{
    /**
     * The DateTime with the transation took place
     *
     * @var \DateTime
     */
    protected $transactedAt;

    /**
     * The transaction's splits
     *
     * @var \OldTimeGuitarGuy\Budget\Splits
     */
    protected $splits;

    /**
     * The description
     *
     * @var string
     */
    protected $description;

    /**
     * Transaction
     *
     * @param \Date  $transactedAt
     * @param \OldTimeGuitarGuy\Budget\Splits $splits
     * @param string $description
     */
    public function __construct(\DateTime $transactedAt, Splits $splits, $description = '')
    {
        $this->transactedAt = $transactedAt;
        $this->splits = $splits;
        $this->description = $description;
    }

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Get the datetime the transaction was made
     *
     * @return \DateTime
     */
    public function transactedAt()
    {
        return $this->transactedAt;
    }

    /**
     * Get the splits
     *
     * @return \OldTimeGuitarGuy\Budget\Splits
     */
    public function splits()
    {
        return $this->splits;
    }

    /**
     * Get the transaction description
     *
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * Determine if this transaction is valid
     *
     * @return boolean
     */
    public function isValid()
    {
        return $this->splits()->balance()->amount() === 0;
    }
}
