<?php

namespace App\Listeners;

use App\Events\Event;
use App\Helpers\EventSubscriber;

class SplitListener extends EventSubscriber
{
    /**
     * A split was just created
     *
     * We need to adjust the balance of the related account
     *
     * @param  Event  $event
     * @return void
     */
    public function onSplitCreated(Event $event)
    {
        //
    }

    /**
     * A split was just updated
     *
     * We need to adjust the balance of the related account
     *
     * @param  Event  $event
     * @return void
     */
    public function onSplitUpdated(Event $event)
    {
        //
    }
}
