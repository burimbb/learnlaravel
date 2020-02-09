<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserReportsMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $period;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($period)
    {
        $this->period = $period;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $frequency = "All the Time";
        $users = User::all();
        
        if( $this->period == 'daily'){
            $users = User::where('created_at', ">=", \now()->subDay())->get();
            $frequency = "Daily";
        }else if($this->period == 'weekly'){
            $users = User::where('created_at', ">=", \now()->subWeek())->get();
            $frequency = "Weekly";
        }else if($this->period == 'monthly'){
            $users = User::where('created_at', ">=", \now()->subMonth())->get();
            $frequency = "Monthly";
        }else if($this->period == 'yearly'){
            $users = User::where('created_at', ">=", \now()->subYear())->get();
            $frequency = "Yearly";
        }

        return $this->subject($frequency.' User Reports')
                    ->markdown('reports.user_reporting', [
                            'users' => $users,
        ]);
    }
}
