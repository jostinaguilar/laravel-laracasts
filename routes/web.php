<?php

use App\Http\Controllers\JobsController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');

/* Route::controller(JobsController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
}); */

Route::resource('jobs', JobsController::class);

Route::view('/contact', 'contact');
