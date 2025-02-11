<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
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
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function edit(Job $job)
    {
        /* Gate::authorize('edit-job', $job); */

        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // Authorise the request (On Hold...)

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect("/jobs/{$job->id}");
    }

    public function destroy(Job $job)
    {
        //Authorise the request (On Hold...)
        $job->delete();
        return redirect('/jobs');
    }
}
