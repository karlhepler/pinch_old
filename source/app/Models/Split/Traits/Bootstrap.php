<?php

namespace App\Models\Split\Traits;

use Event;
use App\Events\Split\Created;
use App\Events\Split\Updated;
use App\Events\Split\Deleted;
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
            Event::fire(new Created($split));
        });

        /**
         * The Split was just updated
         */
        static::updated(function(Split $split) {
            Event::fire(new Updated($split));
        });

        /**
         * The Split was just destroyed
         */
        static::deleted(function(Split $split) {
            Event::fire(new Deleted($split));
        });
    }
}