<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');



Route::get('/jobs', [JobsController::class, 'index']);
Route::get('/jobs/create', [JobsController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobsController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobsController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobsController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::put('/jobs/{job}', [JobsController::class, 'update']);
Route::delete('/jobs/{job}', [JobsController::class, 'destroy']);

// Route::resource('jobs', JobsController::class)->middleware('auth');

Route::view('/contact', 'contact');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
