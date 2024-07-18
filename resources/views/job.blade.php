<x-layout titre="Job">
    <x-slot:heading>Single Job</x-slot:heading>

    <h2 class="font-bold text-lg text-orange-500">{{ $job['title'] }}</h2>
    <p>This job pays ${{ $job['salary'] }} per year.</p>
</x-layout>
