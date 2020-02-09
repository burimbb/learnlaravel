<?php

namespace App;

use Illuminate\Support\Facades\Mail;

class PostCardSendingService
{
    protected $country;
    protected $height;
    protected $width;

    public function __construct($country, $height, $width)
    {
        $this->country = $country;
        $this->height = $height;
        $this->width = $width;
    }

    public function hello($message, $email)
    {
        Mail::raw($message, function($message) use ($email){
            $message->to($email);
        });

        dump("Post card was send!!");
    }

    public function test()
    {
        dump(app()->version());
    }
}
