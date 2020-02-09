<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AppClearLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all logs in this application';

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
        $this->info("Clearing the logs!");
        $this->line("Clearing");
        while(glob(storage_path('logs/*.txt'))){
            $this->line('.');
            exec('rm ' . storage_path('logs/*.txt'));
        }

        $this->comment('Logs have been cleared!');
    }
}
