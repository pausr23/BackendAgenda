<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\StatusActivity;

class StatusActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        StatusActivity::create(['name'=>'Active']);
        StatusActivity::create(['name'=>'Ended']);
    }
}
