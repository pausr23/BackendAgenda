<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminActivityController;

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

Route::resource('activities', AdminActivityController::class);

Route::get('/activities/search/activity', [AdminActivityController::class, 'search'])->name('activities.search');


