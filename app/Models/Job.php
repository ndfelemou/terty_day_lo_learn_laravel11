<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            ['id' => 1, 'title' => 'Director', 'salary' => '$100,000'],
            ['id' => 2, 'title' => 'Manager', 'salary' => '$90,000'],
            ['id' => 3, 'title' => 'Engineer', 'salary' => '$80,000'],
            ['id' => 4, 'title' => 'Analyst', 'salary' => '$70,000'],
            ['id' => 5, 'title' => 'Developer', 'salary' => '$85,000'],
            ['id' => 6, 'title' => 'Designer', 'salary' => '$75,000'],
            ['id' => 7, 'title' => 'Consultant', 'salary' => '$95,000'],
            ['id' => 8, 'title' => 'Technician', 'salary' => '$60,000'],
            ['id' => 9, 'title' => 'Administrator', 'salary' => '$65,000'],
            ['id' => 10, 'title' => 'Specialist', 'salary' => '$78,000']
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn ($job) => $job['id'] == $id);

        if (!$job) {
            abort(404);
        }
        // abort_if(!$job, 404);
        return $job;
    }
}
