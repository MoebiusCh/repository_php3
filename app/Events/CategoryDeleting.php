<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Category;

class CategoryDeleting
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $category;
    public $action;
    public $defaultCategoryId;
    /**
     * Create a new event instance.
     */
    public function __construct(Category $category, string $action, $defaultCategoryId = null)
    {
        $this->category = $category;
        $this->action = $action;
        $this->defaultCategoryId = $defaultCategoryId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
