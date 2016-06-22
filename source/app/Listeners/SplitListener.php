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
        $event->split->account
            ->adjustNormalBalance($event->split)
            ->save();
    }

    /**
     * A split was just updated
     *
     * We need to adjust the balance of the related account.
     * However, we need to do two operations in order to accomplish this.
     * We need to remove the effect the previous entry had on the balance.
     * Then we need to affect the balance with the new entry.
     *
     * @param  Event  $event
     * @return void
     */
    public function onSplitUpdated(Event $event)
    {
        $event->split->account
            ->adjustNormalBalance($event->split->contra())
            ->adjustNormalBalance($event->split)
            ->save();
    }

    /**
     * A split was just destroyed
     *
     * We need to adjust the balance of the related account
     *
     * @param  Event  $event
     * @return void
     */
    public function onSplitDeleted(Event $event)
    {
        $event->split->account
            ->adjustNormalBalance($event->split->contra())
            ->save();
    }
}
