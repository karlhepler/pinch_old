<?php

namespace App\Listeners;

use App\Events\Event;
use App\Helpers\EventSubscriber;

class AccountListener extends EventSubscriber
{
    /**
     * The account is about to save!
     *
     * We need to make sure we're not about
     * to end up with a negative normal balance.
     * If so, we have to add it to a liability.
     *
     * @param  Event  $event
     * @return void
     */
    public function onAccountSaving(Event $event)
    {
        // 
    }
}
