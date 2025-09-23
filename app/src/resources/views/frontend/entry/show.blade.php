<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Entry') }} {{ $entry->name }}
            </h2>
            <a href="{{ route('frontend.entry.edit', $entry) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Entry
            </a>
        </div>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
                <div class="flex justify-between items-start">
                    <div>
                        <small>{{ ucfirst($entry->type) }}:</small>&nbsp;<b>{{ $entry->name }}</b><br/>
                        <small>Location:</small>&nbsp;
                        <a href="{{ route('frontend.location.show', $entry->location->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                            {{ $entry->location->name }}
                        </a><br/>
                    </div>
                    <!-- Top right: Timestamps -->
                    <div class="text-xs text-gray-400 dark:text-gray-500 text-right md:ml-4">
                        <div>Created: {{ $entry->created_at->format('Y-m-d H:i') }}</div>
                        <div>Modified: {{ $entry->updated_at->format('Y-m-d H:i') }}</div>
                    </div>
                </div>
                <!-- Description below basic info -->
                <div class="mt-6">
                    <small>Description:</small>
                    <div class="mt-1">{{ $entry->description }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
