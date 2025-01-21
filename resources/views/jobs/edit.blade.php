<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @method('PATCH')
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                 class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="title" id="title"
                                       class="block min-w-0 grow px-2.5 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                       placeholder="Shift leader" value="{{ $job->title }}" required>
                            </div>
                            @error('title')
                                <small class="font-xs font-medium text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                 class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="salary" id="salary"
                                       class="block min-w-0 grow px-2.5 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                       placeholder="$50,000 per year." value="{{ $job->salary }}" required>
                            </div>
                            @error('salary')
                                <small class="font-xs font-medium text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        @endif --}}
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-job"
                        class="rounded-lg border border-red-700 bg-red-50 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}"
                   class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</a>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
    </form>
    <form id="delete-job" class="hidden" action="/jobs/{{ $job->id }}" method="POST">
        @method('DELETE')
        @csrf
    </form>
</x-layout>
