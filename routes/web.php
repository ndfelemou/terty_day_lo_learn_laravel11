<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

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

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    // validation...

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

// Route::get('yes', fn () => view('yes'));
