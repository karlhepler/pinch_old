<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Split\Base\Split;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SplitCreated extends Event
{
    use SerializesModels;

    /**
     * The split that was just created
     *
     * @var \App\Models\Split\Base\Split
     */
    public $split;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Split $split)
    {
        $this->split = $split;
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
