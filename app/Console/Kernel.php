<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
{
    // Schedule the command to run daily
    $schedule->command('activities:update-status')->daily();
}

protected function commands()
{
    $this->load(__DIR__.'/Commands');

    require base_path('routes/console.php');
}

protected $routeMiddleware = [
    // Otros middlewares...
    'auth.admin' => \App\Http\Middleware\AuthenticateAdmin::class,
];


}
