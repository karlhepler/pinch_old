<?php

namespace App\Models\Split\Traits;

trait Bootstrap
{
    /**
     * The "booting" method of the model
     *
     * @return void
     */
    public static function bootModelEvents()
    {
        /**
         * The Split was just saved
         */
        static::saved(function(Split $split) {
            // Fire an event!
        });
    }
}