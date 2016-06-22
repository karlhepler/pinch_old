<?php

namespace App\Models\Split\Traits;

use Event;
use App\Events\SplitCreated;
use App\Events\SplitUpdated;
use App\Models\Split\Base\Split;

trait Bootstrap
{
    /**
     * The "booting" method of the model
     *
     * @return void
     */
    public static function bootBootstrap()
    {
        /**
         * The Split was just created
         */
        static::created(function(Split $split) {
            Event::fire(new SplitCreated($split));
        });

        /**
         * The Split was just updated
         */
        static::updated(function(Split $split) {
            Event::fire(new SplitUpdated($split));
        });
    }
}