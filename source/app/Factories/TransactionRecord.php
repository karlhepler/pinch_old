<?php

namespace App\Factories;

use Carbon\Carbon;
use App\Collections\Splits;
use App\Helpers\FluentFactory;
use App\Models\Merchant\Merchant;
use App\Models\Transaction\Transaction;

/**
 * This provides a fluent iterface for creating a transaction
 */
class TransactionRecord extends FluentFactory
{
    /**
     * The associative array that will be
     * passed to the Transaction constructor.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * This will contain the splits
     * defined for this transaction
     *
     * @var null|\App\Collections\Splits
     */
    protected $splits = null;

    ////////////////////////
    // PUBLIC API METHODS //
    ////////////////////////

    /**
     * When this transaction took place
     *
     * @param  string|\DateTime $transactedAt
     * @return $this
     */
    public function on($transactedAt)
    {
        $transactedAt = $transactedAt instanceof \DateTime
            ? Carbon::instance($transactedAt)
            : Carbon::createFromFormat('Y-m-d', $transactedAt);

        $this->attributes['transacted_at'] = $transactedAt;

        return $this;
    }

    /**
     * State with whom this transaction is with
     *
     * @param  integer|\App\Models\Merchant\Merchant $merchant
     * @return $this
     */
    public function with($merchant)
    {
        $merchant = $merchant instanceof Merchant
            ? $merchant->id
            : $merchant;

        $this->attributes['merchant_id'] = $merchant;

        return $this;
    }

    /**
     * Add an associated description to the transaction
     *
     * @param  string $description
     * @return $this
     */
    public function describedBy($description)
    {
        $this->attributes['description'] = $description;

        return $this;
    }

    /**
     * A collection of splits for this transaction
     *
     * @param  array $splits
     * @return $this
     */
    public function havingSplits(array $splits)
    {
        $this->splits = $splits;

        return $this;
    }

    /**
     * Record the transaction
     *
     * @return \App\Models\Transaction\Transaction
     */
    public function create()
    {
        $transaction = Transaction::create($this->attributes);

        if ( $this->splitsWereSet() ) {
            $transaction->addSplits($this->splits);
        }

        return $transaction;
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Determine if splits were set
     *
     * @return boolean
     */
    protected function splitsWereSet()
    {
        return !is_null($this->splits);
    }
}
