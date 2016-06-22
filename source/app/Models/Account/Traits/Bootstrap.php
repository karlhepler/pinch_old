<?php

namespace App\Models\Account\Traits;

use Event;
use App\Events\Account\Saving;
use App\Models\Account\Base\Account;

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
         * The Account is about to save
         */
        static::saving(function(Account $account) {
            Event::fire(new Saving($account));
        });
    }
}