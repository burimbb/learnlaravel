<?php

namespace App\Console\Commands;

use App\Mail\UserReportsMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UserReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:user-registered {period}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All users registered today reports';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::to("burim@burim.com")->send(
            new UserReportsMail($this->argument('period'))
        );
    }
}
