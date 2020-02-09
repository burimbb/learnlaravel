<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->everyFiveMinutes()
                 ->sendOutputTo(storage_path("/logs/test.txt"));
        
        $schedule->command('reports:user-registered daily')
                 ->everyMinute();
        
        $schedule->command('reports:user-registered weekly')
                 ->everyMinute();
        $schedule->command('reports:user-registered monthly')
                 ->everyMinute();
        $schedule->command('reports:user-registered yearly')
                 ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
