<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RegisteredActivity;
use Carbon\Carbon;

class UpdateActivityStatus extends Command
{
    protected $signature = 'activities:update-status';
    protected $description = 'Update the status of activities past their scheduled date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get current date
        $currentDate = Carbon::now();

        // Update status for activities past their scheduled date
        RegisteredActivity::where('scheduled_at', '<', $currentDate)
            ->where('status_activities_id', '!=', 2) // Assuming 2 is the ID for 'endend'
            ->update(['status_activities_id' => 2]);

        $this->info('Activities status updated successfully.');
    }
}
