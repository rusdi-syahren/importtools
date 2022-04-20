<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        Commands\JurnalCron::class,
    ];

    protected function schedule(Schedule $schedule)
    {

        $schedule->command('jurnal:cron')->monthlyOn(env('MONTHLY_POSTING_JURNAL_DATE'), env('MONTHLY_POSTING_JURNAL_HOUR'));
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
