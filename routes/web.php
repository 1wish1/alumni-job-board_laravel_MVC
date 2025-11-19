<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Landing page
Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {

    // ✅ Jobs accessible ONLY by admin
    Route::middleware(['role:admin'])->group(function () { 
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create'); 
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
        Route::get('/jobs/{job}/applications', [AdminJobController::class, 'applications'])->name('admin.jobs.applications');
        Route::post('/applications/{application}/update', [AdminJobController::class, 'updateApplication'])->name('admin.applications.update');
    });
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    
    // ✅ Applications (only alumni)
    Route::middleware(['role:alumni'])->group(function () {
        Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('applications.create');
        Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('applications.store');
        Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    });

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');