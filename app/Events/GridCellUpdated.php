<?php

namespace App\Events;

use Heritage\Broadcasting\Channel;
use Heritage\Broadcasting\InteractsWithSockets;
use Heritage\Contracts\Broadcasting\ShouldBroadcast;
use Heritage\Foundation\Events\Dispatchable;
use Heritage\Queue\SerializesModels;

class GridCellUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public array $data)
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('grid');
    }

    public function broadcastAs(): string
    {
        return 'cell-updated';
    }

    public function broadcastWith(): array
    {
        return $this->data;
    }
}
