<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TagsActivity;

class TagsActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TagsActivity::create(['name'=>'Task']);
        TagsActivity::create(['name'=>'Announcement']);
        TagsActivity::create(['name'=>'Event']);
    }
}
