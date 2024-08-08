<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::with('employer')->get();
        // $jobs = Job::all();
        // $jobs = Job::with('employer')->paginate(1);
        $jobs = Job::with('employer')->latest()->simplePaginate(4);
        // $jobs = Job::with('employer')->cursorPaginate(1);
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'salary' => ['required'],
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
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        // validation
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'salary' => ['required'],
        ]);

        // authorize (On hold....)

        // Update the job
        // and persist
        // $job = Job::findOrFail($job);

        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        // redirect to the job page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // autorize (On hold...)

        // delete the job
        // $job = Job::findOrFail($id);
        // $job->delete();

        // Or we can to
        // Job::findOrFail($job)->delete();
        $job->delete();

        // redirect
        return redirect('/jobs');
    }
}
