<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CoursesActivity;

class CoursesActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CoursesActivity::create(['name'=>'Programming']);
        CoursesActivity::create(['name'=>'Web Design']);
        CoursesActivity::create(['name'=>'QA Applications']);
        CoursesActivity::create(['name'=>'Spanish Grammar']);
        CoursesActivity::create(['name'=>'Digital Drawing']);
        CoursesActivity::create(['name'=>'Security of Apps']);
        CoursesActivity::create(['name'=>'Graphic Design']);
        CoursesActivity::create(['name'=>'Audiovisuals']);
        CoursesActivity::create(['name'=>'Apps Development']);
        CoursesActivity::create(['name'=>'Photography']);

    }
}
