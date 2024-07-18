<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    // \Illuminate\Support\Arr::first($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    // $job = Arr::first(Job::all(), fn ($job) => $job['id'] == $id);
    $job = Job::find($id);
    return view('job', [
        'job' => $job
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('yes', fn () => view('yes'));



// =========================================================================
/**
    ['id' => 11, 'title' => 'Coordinator', 'salary' => '$55,000'],
    ['id' => 12, 'title' => 'Architect', 'salary' => '$92,000'],
    ['id' => 13, 'title' => 'Scientist', 'salary' => '$98,000'],
    ['id' => 14, 'title' => 'Executive', 'salary' => '$110,000'],
    ['id' => 15, 'title' => 'Officer', 'salary' => '$88,000'],
    ['id' => 16, 'title' => 'Planner', 'salary' => '$67,000'],
    ['id' => 17, 'title' => 'Supervisor', 'salary' => '$72,000'],
    ['id' => 18, 'title' => 'Producer', 'salary' => '$86,000'],
    ['id' => 19, 'title' => 'Director', 'salary' => '$100,000'],
    ['id' => 20, 'title' => 'Manager', 'salary' => '$90,000'],
    ['id' => 21, 'title' => 'Engineer', 'salary' => '$80,000'],
    ['id' => 22, 'title' => 'Analyst', 'salary' => '$70,000'],
    ['id' => 23, 'title' => 'Developer', 'salary' => '$85,000'],
    ['id' => 24, 'title' => 'Designer', 'salary' => '$75,000'],
    ['id' => 25, 'title' => 'Consultant', 'salary' => '$95,000'],
    ['id' => 26, 'title' => 'Technician', 'salary' => '$60,000'],
    ['id' => 27, 'title' => 'Administrator', 'salary' => '$65,000'],
    ['id' => 28, 'title' => 'Specialist', 'salary' => '$78,000'],
    ['id' => 29, 'title' => 'Coordinator', 'salary' => '$55,000'],
    ['id' => 30, 'title' => 'Architect', 'salary' => '$92,000'],
 */
