<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisteredActivityController;
use App\Http\Controllers\CategoriesActivityController;
use App\Http\Controllers\CoursesActivityController;
use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\RegisteredUsersController;
use App\Http\Controllers\UserCourseController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/activities/all', [RegisteredActivityController::class, 'index']);
Route::get('/activities/test', [RegisteredActivityController::class, 'test']);
Route::get('/activities/activity/{id}', [RegisteredActivityController::class, 'show']);

Route::get('/categories/all', [CategoriesActivityController::class, 'index']);
Route::get('/courses/all', [CoursesActivityController::class, 'index']);

Route::get('activities/search', [AdminActivityController::class, 'search']);

Route::get('/registered-activities/filtered/{categoryId?}/{statusId?}', [RegisteredActivityController::class, 'indexFiltered']);

Route::get('/registered-activities/weekly/{categoryId?}/{statusId?}', [RegisteredActivityController::class, 'getWeeklyTasks']);
Route::get('/registered-activities/daily/{categoryId?}/{statusId?}', [RegisteredActivityController::class, 'getDailyTasks']);


Route::get('/register', [RegisteredUsersController::class, 'store']);
Route::get('/login', [RegisteredUsersController::class, 'login']);

Route::get('/courses', [CoursesActivityController::class, 'index']);

Route::get('/students', [UserCourseController::class, 'indexApi'])->name('students.index.api');

Route::group(['prefix' => 'users'], function () {
    Route::post('register', [RegisteredUsersController::class, 'store']);
    Route::post('login', [RegisteredUsersController::class, 'login']);
    Route::post('logout', [RegisteredUsersController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('user', [RegisteredUsersController::class, 'show'])->middleware('auth:sanctum');

    Route::post('user/courses', [UserCourseController::class, 'store']);
});

