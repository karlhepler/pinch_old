<?php

namespace OldTimeGuitarGuy\Budget;

use OldTimeGuitarGuy\Budget\Money\Credit;

abstract class Book
{
    /**
     * The collection of things
     *
     * @var array
     */
    protected $collection = [];

    /**
     * Book
     *
     * @param array $collection
     */
    public function __construct(array $collection = [])
    {
        $this->merge($collection);
    }

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Get the number of elements in the book
     *
     * @return integer
     */
    public function count()
    {
        return count($this->items());
    }

    /**
     * Get the first element of the book
     *
     * @return mixed|null
     */
    public function first()
    {
        return $this->isEmpty()
            ? null
            : $this->items()[0];
    }

    /**
     * Get the last element of the book
     *
     * @return mixed|null
     */
    public function last()
    {
        return $this->isEmpty()
            ? null
            : $this->items()[$this->lastIndex()];
    }

    /**
     * Merge this book with another collection
     *
     * @param  mixed $collection
     * @return void
     */
    public function merge($collection)
    {
        if ( $collection instanceof Book ) {
            array_map([$this, 'push'], $collection->items());
            return;
        }

        array_map([$this, 'push'], $collection);
    }

    /**
     * Push an element into the book
     *
     * @param  $element
     * @return void
     */
    public function push($element)
    {
        $this->enforceElementType($element);

        array_push($this->collection, $element);
    }

    /**
     * Determine if this book is empty
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->count() === 0;
    }

    /**
     * Get the index of the last element
     *
     * @return integer
     */
    public function lastIndex()
    {
        return $this->count() - 1;
    }

    /**
     * Get the elements of this book
     *
     * @return array
     */
    public function items()
    {
        return $this->collection;
    }

    /**
     * Reduce the items in the array to a single Money
     *
     * @param  callable $callback
     * @return \OldTimeGuitarGuy\Budget\Money\Money
     */
    public function reduce(callable $callback)
    {
        return array_reduce($this->items(), $callback, new Credit);
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Enforce the element type
     *
     * @param  mixed $element
     * @return void
     * @throws InvalidArgumentException
     */
    protected function enforceElementType($element)
    {
        if (! is_a($element, $this->elementType()) ) {
            throw new \InvalidArgumentException(get_class($this) . ' only accepts elements of type ' . $this->elementType());
        }
    }

    //////////////////////
    // ABSTRACT METHODS //
    //////////////////////

    /**
     * Get the balance of all of the elements in the book
     *
     * @return \OldTimeGuitarGuy\Budget\Money\Money
     */
    abstract public function balance();

    /**
     * Get the element type that this book accepts
     *
     * @return string
     */
    abstract protected function elementType();
}