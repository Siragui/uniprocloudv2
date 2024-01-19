<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TimetableController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//    Routes pour les Profile
// Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
// Route::put('/profile/edit/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
// Route::put('/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');




    Route::resource("subjects", SubjectController::class);


    Route::resource('projects', ProjectController::class);


    Route::resource('events', EventController::class);


    Route::resource('courses', CourseController::class);


    Route::resource('timetables', TimetableController::class);

    Route::resource('profiles', ProfileController::class);

    Route::resource('replies', RepliesController::class);

    Route::resource('users', UserController::class);

    Route::resource('profiles', ProfileController::class);


    Route::get('/register/prof', function () {
        return view('auth/prof_register');
    });

    Route::get('/search', [CourseController::class, 'search']);
