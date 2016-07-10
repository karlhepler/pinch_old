<?php

namespace App\Pinch;

use BadMethodCallException;

/**
 * Allows for factory that can be executed fluently.
 * If a method is started with "and", that means
 * we're all done and it's time to create.
 */
abstract class FluentFactory
{
    /**
     * Create & save the model to the database
     *
     * @return mixed
     */
    abstract public function create();

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
     * the prepended "and" or "thatIs"
     *
     * @param  string $methodName
     * @return string|boolean
     */
    protected function finalMethodName($methodName)
    {
        $result = preg_match("/^(?:and|thatIs)(.+)$/", $methodName, $matches);

        if ( $result !== 1 ) {
            return false;
        }

        return lcfirst($matches[1]);
    }
}