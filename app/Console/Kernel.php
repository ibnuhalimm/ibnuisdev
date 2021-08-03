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
        // $schedule->command('inspire')->hourly();

        $schedule->command('sitemap:generate')->daily();
        $schedule->command('analytics:last-day-total-visitor')->everyFiveMinutes();
        $schedule->command('analytics:last-month-total-visitor')->everyFiveMinutes();
        $schedule->command('analytics:most-visited-pages 7')->everyFiveMinutes();

        $schedule->command('snapshot:create')->everyFourHours();
        $schedule->command('snapshot:cleanup --keep=3')->everyFourHours();

        $schedule->command('telescope:prune --hours=48')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
