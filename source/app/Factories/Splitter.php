<?php

namespace App\Factories;

/**
 * How do you create splits?
 * With a splitter, of course!
 */
class Splitter
{
    /**
     * Get a new child instance of Split
     *
     * @param  array  $split
     * @return \App\Models\Split\Base\Split
     */
    public static function newInstance(array $split)
    {
        // Get the class based on type
        $class = config('pinch.splitTypes')[$split['type']];

        // Return a new instance of that class
        return new $class($split);
    }
}
