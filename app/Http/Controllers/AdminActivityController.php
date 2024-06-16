<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Models\StatusActivity;
use App\Models\CategoriesActivity;
use App\Models\TagsActivity;
use App\Models\RegisteredActivity;


class AdminActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activities = RegisteredActivity::select(
            'registered_activities.id',
            'categories_activities.name as category',
            'registered_activities.name',
            'registered_activities.description',
            'registered_activities.scheduled_at',
            'status_activities.name as status',
            'tags_activities.name as tag'
        )
        ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
        ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
        ->join('tags_activities', 'registered_activities.tags_activities_id', '=', 'tags_activities.id') 
        ->where('status_activities_id', 1)
        ->orderBy('scheduled_at', 'asc')
        ->get();

        $categories = CategoriesActivity::all();

        $total = count(RegisteredActivity::all()->where('status_activity_id', 1));
        return view('activities.index', compact('activities', 'total', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoriesActivity::all();
        $tags = TagsActivity::all();
        $status = StatusActivity::all();
        
        return view('activities.create', compact('categories', 'tags', 'status'));
        
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
            'tags_activities_id' =>$request->tags_activities_id,
            'status_activities_id'=>$request->status_activities_id,
            'name' =>$request->name,
            'description' =>$request->description,
            'image'=>$file_name,
            'scheduled_at'=>$request->scheduled_at,
        ]);
        return redirect()->route('activities.index')->with('success','Activity registered succesfully');
    }

    public function search(Request $request){
        if($request->category == 0){
            $activities = RegisteredActivity::select(
                'registered_activities.id',
                'registered_activites.id as category_id',
                'categories_activities.name as category',
                'registered_activities.name',
                'registered_activities.scheduled_at' 
            )
            ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
            ->whereAny(['registered_activities.name'], 'LIKE', '%' . $request->event . '%')
            ->whereBetween('scheduled_at', [$request->from_date, $request->to_date])
            ->where('status_activities_id', 1)
            ->orderBy('scheduled_at', 'asc')
            ->get();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = RegisteredActivity::select(
            'categories_activities.name as category',
            'registered_activities.title as name',
            'registered_activities.description',
            'registered_activities.image',
            'registered_activities.scheduled_at',
            'tags_activities.name as tag',
            'status_activities.name as status'

        )
        
        ->join('categories_activities', 'registered_activities.categories_activities_id', '=', 'categories_activities.id')
        ->join('tags_activities', 'registered_activities.tags_activities_id', '=', 'tags_activities.id')
        ->join('status_activities', 'registered_activities.status_activities_id', '=', 'status_activities.id')
        ->where('registered_activities.id', $id)
        ->get();

        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $activity = RegisteredActivity::find($id);
        $categories = CategoriesActivity::all();
        $tags = TagsActivity::all();
        $status = StatusActivity::all();
        
        return view('activities.edit', compact('event', 'categories', 'tags', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $file = $request->file('image');
        
        $query = RegisteredActvity::find($id);

        if($query){
            if($file != null){
                $file_to_remove = 'storage/images/'.$request->old_image;
                if(File::exists($file_to_remove)){
                    File::delete($file_to_remove);
                }
                $file_name = 'activity_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images', $file_name);
            }else{
                $file_name = $request->old_image;
            }

            $query->update([
                'categories_activities_id' => $request->categories_activities_id,
                'tags_activities_id' =>$request->tags_activities_id,
                'status_activities_id'=>$request->status_activities_id,
                'name' =>$request->name,
                'description' =>$request->description,
                'image'=>$file_name,
                'scheduled_at'=>$request->scheduled_at,
            ]);
            return redirect()->route('activities.index')->with('success','Event updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $result = RegisteredActivity::find($id);
        $result->delete();

        return redirect()->route('activities.index')->with('success','Activity delete successfully');
        
    }
}
