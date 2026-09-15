<?php

namespace App\Events;

use Heritage\Broadcasting\Channel;
use Heritage\Broadcasting\InteractsWithSockets;
use Heritage\Contracts\Broadcasting\ShouldBroadcast;
use Heritage\Foundation\Events\Dispatchable;
use Heritage\Queue\SerializesModels;

class GridRainStarted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public string $emoji)
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('grid');
    }

    public function broadcastAs(): string
    {
        return 'rain-started';
    }

    public function broadcastWith(): array
    {
        return ['emoji' => $this->emoji];
    }
}
