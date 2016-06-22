<?php

namespace App\Events\Account;

use App\Events\Event;
use App\Models\Account\Base\Account;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Saving extends Event
{
    use SerializesModels;

    /**
     * The account that is about to be saved
     *
     * @var \App\Models\Account\Base\Account
     */
    public $account;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
