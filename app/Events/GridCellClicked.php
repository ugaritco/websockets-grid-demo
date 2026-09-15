<?php

namespace App\Events;

use Heritage\Broadcasting\Channel;
use Heritage\Broadcasting\InteractsWithSockets;
use Heritage\Contracts\Broadcasting\ShouldBroadcast;
use Heritage\Foundation\Events\Dispatchable;
use Heritage\Queue\SerializesModels;

class GridCellClicked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public int $position,
        public int $clickCount,
    ) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('grid'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'cell-clicked';
    }
}
