<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $working_on;
    public $category;

    public function __construct(User $user, $working_on, $category='' )
    {
        $this->user = $user;
        $this->working_on = $working_on;
        $this->category = $category;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
