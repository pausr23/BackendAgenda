<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CoursesActivity;
use App\Models\RegisteredActivity;

class CoursesActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $courses = CoursesActivity::select(
        'courses_activities.id',
        'courses_activities.name'
    )->get();

    foreach ($courses as $course) {
        $activities = RegisteredActivity::where('courses_activities_id', $course->id)
            ->where('status_activities_id', 1)
            ->count();

        $course['activities'] = $activities;
    }

    return $courses;
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
