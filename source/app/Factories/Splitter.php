<?php

namespace App\Factories;

/**
 * This is the only way we're creating splits!
 * DON'T FORGET IT!
 *
 * @todo I was thinking this might be a good extension
 * to the single table inheritance class. I was
 * also thinking that singleTableInheritanceChildren
 * should be static and I can rewrite the SingleTableInheritanceParent
 * to take advantage of that instead of creating new instances
 * all the time.
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
        $class = config('budget.split_types')[$split['type']];

        // Return a new instance of that class
        return new $class($split);
    }
}