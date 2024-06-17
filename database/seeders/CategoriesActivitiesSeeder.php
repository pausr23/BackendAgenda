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
        CategoriesActivity::create(['name'=>'Career']);
        CategoriesActivity::create(['name'=>'Course']);
        CategoriesActivity::create(['name'=>'University']);
        CategoriesActivity::create(['name'=>'Students']);

    }
}
