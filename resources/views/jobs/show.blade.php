<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="text-lg font-bold">{{ $job->title }}</h2>
    <p>This job pays {{ $job->salary }} per year.</p>
    @can('edit', $job)
        <div class="mt-2">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button>
        </div>
    @endcan
</x-layout>
