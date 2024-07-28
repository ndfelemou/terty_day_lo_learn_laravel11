<x-layout titre="Job">
    <x-slot:heading>Single Job</x-slot:heading>

    <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
    <div>{{ $job['title'] }} : <strong>{{ $job['salary'] }}</strong> per year.</div>
</x-layout>
