<x-layout titre="Job">
    <x-slot:heading>Single Job</x-slot:heading>

    {{-- <h2 class="font-bold text-blue-500 text-lg">{{ $job->employer->name }}</h2> --}}

    <h2>
        {{ $job->title }} : <strong>{{ $job->salary }}</strong> per year.
    </h2>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
</x-layout>
