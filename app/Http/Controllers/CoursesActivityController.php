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
     * Assign courses to a user.
     */
    public function assignCourses(Request $request, $userId)
    {
        // Obtener los IDs de cursos seleccionados desde la solicitud
        $selectedCourses = $request->input('selectedCourses');

        // Asignar los cursos seleccionados al usuario dado
        // Suponiendo que tienes una tabla pivot para la relación entre usuarios y cursos
        // Ejemplo: users_courses (user_id, course_id)

        // Aquí debes implementar la lógica para guardar las asignaciones en la base de datos
        // Por ejemplo:
        // foreach ($selectedCourses as $courseId) {
        //     $user->courses()->attach($courseId);
        // }

        return response()->json(['message' => 'Courses assigned successfully.']);
    }
}
