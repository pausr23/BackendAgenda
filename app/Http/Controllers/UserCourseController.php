<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CoursesActivity;

class UserCourseController extends Controller
{

    public function index()
{
    $users = User::select(
            'users.id',
            'users.name',
            'users.email',
            'courses_activities.name as course'
        )
        ->leftJoin('course_user', 'users.id', '=', 'course_user.user_id')
        ->leftJoin('courses_activities', 'course_user.course_id', '=', 'courses_activities.id')
        ->orderBy('users.name')
        ->get();

    $total = $users->count();

    return view('activities.students', compact('users', 'total'));
}

    public function getUsersForApi()
    {
        $users = User::select(
                'users.id',
                'users.name',
                'users.email',
                'courses_activities.name as course'
            )
            ->join('course_user', 'users.id', '=', 'course_user.user_id')
            ->join('courses_activities', 'course_user.course_id', '=', 'courses_activities.id')
            ->orderBy('users.name')
            ->get();

        $total = $users->count();

        return response()->json([
            'users' => $users,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        try {
            $userId = $request->input('userId');
            $selectedCourses = $request->input('selectedCourses');

            if (!$userId || !$selectedCourses) {
                return response()->json(['error' => 'Invalid data'], 400);
            }

            $user = User::findOrFail($userId);
            $user->courses()->sync($selectedCourses);

            return response()->json(['message' => 'Courses registered successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
