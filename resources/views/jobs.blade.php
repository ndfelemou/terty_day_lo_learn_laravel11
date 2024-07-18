<x-layout titre="Jobs">
    <x-slot:heading>Jobs List</x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}">
                    <strong class="text-orange-500">{{ $job['title'] }}</strong> : ${{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
