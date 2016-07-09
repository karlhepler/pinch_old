<?php

namespace App\Models\Account\Base\Traits;

use Event;
use App\Models\Account\Base\Account;
use App\Events\Account\AccountSaving;

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
        static::saving(function (Account $account) {
            Event::fire(new AccountSaving($account));
        });
    }
}
