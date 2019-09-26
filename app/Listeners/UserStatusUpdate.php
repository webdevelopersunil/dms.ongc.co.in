<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserStatusUpdate
{
    public function __construct()
    {
        //
    }

    public function handle(UserEvent $event)
    {
        $user = $event->user;
        $user->working_on = $event->working_on;
        $user->category = $event->category;
        $user->save();
    }
}
