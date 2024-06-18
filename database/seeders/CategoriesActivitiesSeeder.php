<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CategoriesActivity;

class CategoriesActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CategoriesActivity::create(['name'=>'Task']);
        CategoriesActivity::create(['name'=>'Announcement']);
        CategoriesActivity::create(['name'=>'Event']);

    }
}
