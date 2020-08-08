<?php

namespace App\Listeners;

use App\Events\UserHasCreated;
use App\Mail\WelcomeEventMail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail
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
     * @param  UserHasCreated  $event
     * @return void
     */
    public function handle(UserHasCreated $event)
    {
        Mail::to(User::first())->send(new WelcomeEventMail());
    }
}
