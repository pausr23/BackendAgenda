<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RegisteredActivity;

class RegisteredActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\
        RegisteredActivity::create(['name'=>'Python Workshop','description'=>'A hands-on workshop to learn the basics of Python programming, including data types, loops.']);
    }
}
