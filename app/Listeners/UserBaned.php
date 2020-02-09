<?php

namespace App\Listeners;

use App\Events\UserReachedNegativePoints;
use App\Notifications\UserBanedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserBaned implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserReachedNegativePoints $event)
    {
        $event->user->notify(new UserBanedNotification($event->user));
    }
}
