<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $attendee;

    public $request;

    /**
     * UserUpdated constructor.
     * @param $attendee
     * @param $request
     */
    public function __construct($attendee, $request)
    {
        $this->attendee = $attendee;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
