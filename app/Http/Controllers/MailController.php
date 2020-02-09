<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Create new public function
     */
    public function store(User $user)
    {
        Mail::to($user)
            ->later(now()->addMinute(), new OrderShipped($user));

        dd('Sent!');
    }
}
