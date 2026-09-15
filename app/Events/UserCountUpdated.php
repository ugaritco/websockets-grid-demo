<?php

namespace App\Events;

use Heritage\Broadcasting\Channel;
use Heritage\Broadcasting\InteractsWithSockets;
use Heritage\Contracts\Broadcasting\ShouldBroadcast;
use Heritage\Foundation\Events\Dispatchable;
use Heritage\Queue\SerializesModels;

class UserCountUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public int $count)
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('grid-active-users');
    }

    public function broadcastAs(): string
    {
        return 'user-count-updated';
    }

    public function broadcastWith(): array
    {
        return ['count' => $this->count];
    }
}
