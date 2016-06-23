<?php

namespace App\Models\Split\Traits;

use Event;
use App\Models\Split\Base\Split;
use App\Events\Split\SplitCreated;
use App\Events\Split\SplitUpdated;
use App\Events\Split\SplitDeleted;

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

        /**
         * The Split was just destroyed
         */
        static::deleted(function(Split $split) {
            Event::fire(new SplitDeleted($split));
        });
    }
}