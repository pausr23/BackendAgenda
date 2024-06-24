<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegisteredActivity;

use Illuminate\Support\Carbon;

class RegisteredActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $activities = RegisteredActivity::select(
        'registered_activities.id',
        'registered_activities.title',
        'registered_activities.image',
        'registered_activities.scheduled_at',
        'registered_activities.description',
        'categories_activities.name as category',
        'status_activities.name as status',
        'courses_activities.name as course'
    )
    ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
    ->join('courses_activities', 'registered_activities.courses_activities_id', '=', 'courses_activities.id')
    ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
    ->get();

    foreach ($activities as $activity) {
        $activity->image = "http://projectPlanner.test/storage/images/".$activity->image;
    }

    return $activities;
}

    public function indexFiltered($categoryId = 1, $statusId = 1)
    {
        $query = RegisteredActivity::query()
            ->select(
                'registered_activities.id',
                'categories_activities.name as category',
                'registered_activities.title',
                'registered_activities.description',
                'registered_activities.scheduled_at',
                'status_activities.name as status',
                'courses_activities.name as course'
            )
            ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
            ->join('courses_activities', 'registered_activities.courses_activities_id', '=', 'courses_activities.id')
            ->where('registered_activities.categories_activities_id', $categoryId)
            ->where('registered_activities.status_activities_id', $statusId)
            ->orderBy('scheduled_at', 'asc');

        $activities = $query->get();

        return response()->json($activities);
    }


    public function getWeeklyTasks($categoryId = 1, $statusId = 1)
    {
        $startOfWeek = now()->startOfWeek()->format('Y-m-d H:i:s');
        $endOfWeek = now()->endOfWeek()->format('Y-m-d H:i:s');

        $activities = RegisteredActivity::query()
            ->select(
                'registered_activities.id',
                'categories_activities.name as category',
                'registered_activities.title',
                'registered_activities.description',
                'registered_activities.scheduled_at',
                'status_activities.name as status',
                'courses_activities.name as course'
            )
            ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
            ->join('courses_activities', 'registered_activities.courses_activities_id', '=', 'courses_activities.id')
            ->where('registered_activities.categories_activities_id', $categoryId)
            ->where('registered_activities.status_activities_id', $statusId)
            ->whereBetween('registered_activities.scheduled_at', [$startOfWeek, $endOfWeek])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        return response()->json($activities);
}

    public function getDailyTasks($categoryId = 1, $statusId = 1)
    {
        $startOfDay = now()->startOfDay()->format('Y-m-d H:i:s');
        $endOfDay = now()->endOfDay()->format('Y-m-d H:i:s');

        $activities = RegisteredActivity::query()
            ->select(
                'registered_activities.id',
                'categories_activities.name as category',
                'registered_activities.title',
                'registered_activities.description',
                'registered_activities.scheduled_at',
                'status_activities.name as status',
                'courses_activities.name as course'
            )
            ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
            ->join('courses_activities', 'registered_activities.courses_activities_id', '=', 'courses_activities.id')
            ->where('registered_activities.categories_activities_id', $categoryId)
            ->where('registered_activities.status_activities_id', $statusId)
            ->whereBetween('registered_activities.scheduled_at', [$startOfDay, $endOfDay])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        return response()->json($activities);
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
        $file = $request->file('image');
        $file_name = 'activity_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/images', $file_name);

        RegisteredActivity::create([
            'categories_activities_id' => $request->categories_activities_id,
            'courses_activities_id' =>$request->courses_activities_id,
            'status_activities_id'=>$request->status_activities_id,
            'title' =>$request->title,
            'description' =>$request->description,
            'image'=>$file_name,
            'scheduled_at'=>$request->schedule_at,
        ]);
        return "Activity registered sucesfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $activity = RegisteredActivity::select(
            'categories_activities.name as category',
            'registered_activities.title',
            'registered_activities.description',
            'registered_activities.image',
            'registered_activities.scheduled_at',
            'status_activities.name as status',
            'courses_activities.name as course'
        )
        ->join('courses_activities', 'registered_activities.courses_activities_id', '=', 'courses_activities.id')
        ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
        ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
        ->where('registered_activities.id', $id)
        ->get();

        $activity[0]->image = "http://projectplanner.test/storage/images/".$activity[0]->image;

        return $activity;
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

    public function test()
    {
        Carbon::setLocale('es');
        $activity = RegisteredActivity::select(
            'registered_activities.scheduled_at'
        )
        ->where('registered_activities.id', 10)
        ->get();

        $activity = $activity[0]->scheduled_at;

        $date = Carbon::parse($activity)->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $time = Carbon::parse($activity)->format('h:i A');

        $now = Carbon::now();
        $events = RegisteredActivity::where('scheduled_at', '<', $now)->get();
        
        return $events;
    }
}
