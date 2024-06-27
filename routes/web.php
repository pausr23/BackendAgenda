<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [UsersController::class, 'login'])->name('admin.login');
Route::post('/admin/account/check', [UsersController::class, 'check'])->name('admin.check');
Route::get('/admin/account/register', [UsersController::class, 'create'])->name('admin.register');

Route::get('/students', [UserCourseController::class, 'index'])->name('students.index');

    Route::middleware('auth.admin')->group(function () {
    Route::post('/admin/account/logout', [UsersController::class, 'logout'])->name('admin.logout');
    Route::resource('activities', AdminActivityController::class);
    Route::get('/activities/search/activity', [AdminActivityController::class, 'search'])->name('activities.search');
});

Route::resource('admin', UsersController::class);
