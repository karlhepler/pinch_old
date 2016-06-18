<?php

namespace App;

class Money
{
    /**
     * The raw value
     *
     * @var integer
     */
    protected $value;

    /**
     * Money
     *
     * @param integer $value
     */
    public function __construct($value = 0)
    {
        $this->value = $value;
    }

    /**
     * Get the raw value
     *
     * @return integer
     */
    public function value()
    {
        return $this->value;
    }
}