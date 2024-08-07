<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


// welcom page
Route::get('/', function () {
    return view('home');
});

// List of jobs
Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->get();
    // $jobs = Job::all();
    // $jobs = Job::with('employer')->paginate(1);
    $jobs = Job::with('employer')->latest()->simplePaginate(4);
    // $jobs = Job::with('employer')->cursorPaginate(1);
    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

// Create job form
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store
Route::post('/jobs', function () {
    // validation...
    request()->validate([
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit job form
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job
    ]);
});

// Updating job
Route::patch('/jobs/{id}', function ($id) {
    // validation
    request()->validate([
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required'],
    ]);

    // authorize (On hold....)

    // Update the job
    // and persist
    $job = Job::findOrFail($id);

    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    // redirect to the job page
    return redirect('/jobs/' . $job->id);
});

// Destroying job
Route::delete('/jobs/{id}', function ($id) {
    // autorize (On hold...)

    // delete the job
    // $job = Job::findOrFail($id);
    // $job->delete();

    // Or we can to
    Job::findOrFail($id)->delete();

    // redirect
    return redirect('/jobs');
});

// Get single job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job
    ]);
});

// Contact
Route::get('/contact', function () {
    return view('contact');
});

// Route::get('yes', fn () => view('yes'));
