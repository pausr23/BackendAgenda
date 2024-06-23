<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisteredActivityController;
use App\Http\Controllers\CategoriesActivityController;
use App\Http\Controllers\CoursesActivityController;
use App\Http\Controllers\AdminActivityController;

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
Route::get('activities/api/search', [AdminActivityController::class, 'apiSearch'])->name('activities.api.search');