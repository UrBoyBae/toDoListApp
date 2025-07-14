<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.index');
}); 

// Authentication Routes
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegistrationController::class, 'index'])->middleware('guest')->name('register.index');
Route::post('/register', [RegistrationController::class, 'authenticate'])->name('register.authenticate');

// Activities Routes
Route::get('/activities/allday', [ActivitiesController::class, 'allday'])->middleware('auth')->name('activities.allday');
Route::get('/activities/today', [ActivitiesController::class, 'today'])->middleware('auth')->name('activities.today');
Route::get('/activities/tomorrow', [ActivitiesController::class, 'tomorrow'])->middleware('auth')->name('activities.tomorrow');
Route::get('/activities/nextweek', [ActivitiesController::class, 'nextweek'])->middleware('auth')->name('activities.nextweek');

// Add New Activities Routes
Route::post('/activities/store', [ActivitiesController::class, 'store'])->name('activities.store');
Route::put('/activities/{task_id}', [ActivitiesController::class, 'update'])->name('activities.update');
Route::delete('/activities/{task_id}', [ActivitiesController::class, 'destroy'])->name('activities.destroy');
