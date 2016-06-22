<?php

namespace App\Factories;

use Carbon\Carbon;
use BadMethodCallException;
use App\Collections\Splits;
use App\Models\Merchant\Merchant;
use App\Models\Transaction\Transaction;

/**
 * This provides a fluent iterface for creating a transaction
 */
class TransactionRecord
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
            $transaction->splits()->createMany($this->splits);
        }

        return $transaction;
    }

    ////////////////////
    // HELPER METHODS //
    ////////////////////

    /**
     * This is here to catch a method call that starts with "and".
     * If it starts with "and", then that means we're done defining
     * the transaction and we're ready to actually create the transaction.
     *
     * @param  string $methodName
     * @param  array  $args
     * @return \App\Models\Transaction\Transaction
     * @throws \BadMethodCallException
     */
    public function __call($methodName, array $args)
    {
        if (! $this->isValidFinalMethod($methodName) ) {
            throw new BadMethodCallException($methodName);
        }

        call_user_func_array([$this, $this->finalMethodName($methodName)], $args);

        return $this->create();
    }
    
    /**
     * Determine if this is the final method
     * and it is a valid method on the class
     *
     * @param  string  $methodName
     * @return boolean
     */
    protected function isValidFinalMethod($methodName)
    {
        return $this->isFinalMethod($methodName)
            && $this->isValidMethod($methodName);
    }

    /**
     * Determine if this is the final method in the chain
     *
     * @param  string  $methodName
     * @return boolean
     */
    protected function isFinalMethod($methodName)
    {
        return !empty($this->finalMethodName($methodName));
    }

    /**
     * Determine if this is a valid method name
     *
     * @param  string  $methodName
     * @return boolean
     */
    protected function isValidMethod($methodName)
    {
        return method_exists($this, $this->finalMethodName($methodName));
    }

    /**
     * Get the final method's name, without
     * the prepended "and"
     *
     * @param  string $methodName
     * @return string|boolean
     */
    protected function finalMethodName($methodName)
    {
        $result = preg_match("/^and(.+)$/", $methodName, $matches);

        if ( $result !== 1 ) {
            return false;
        }

        return lcfirst($matches[1]);
    }

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