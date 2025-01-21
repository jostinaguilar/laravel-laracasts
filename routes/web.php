<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

// Create a new job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store the new job
Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Show a single job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', [
        'job' => $job
    ]);
});

// Edit a job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', [
        'job' => $job
    ]);
});

// Udpate a job
Route::patch('/jobs/{id}', function ($id) {

    // Validate the request
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // Authorise the request (On Hold...)
    // Update the job
    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    // Redirect to the job page
    return redirect("/jobs/{$job->id}");
});

// Destroy a job
Route::delete('/jobs/{id}', function ($id) {
    //Authorise the request (On Hold...)
    // Delete the job
    $job = Job::findOrFail($id);
    $job->delete();

    // Redirect to the jobs page
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
