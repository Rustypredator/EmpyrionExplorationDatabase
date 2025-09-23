<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Distance') }} {{$distance->fromLocation->name}} to {{$distance->toLocation->name}}
            </h2>
            <a href="{{ route('frontend.distance.edit', $distance->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Distance
            </a>
        </div>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
                <div class="flex justify-between items-start">
                    <div>
                        <small>From:</small>&nbsp;<b>{{ $distance->fromLocation->name }}</b><br/>
                        <small>To:</small>&nbsp;<b>{{ $distance->toLocation->name }}</b><br/>
                        <small>Distance:</small>&nbsp;{{ $distance->distance }}<br/>
                    </div>
                    <!-- Top right: Timestamps -->
                    <div class="text-xs text-gray-400 dark:text-gray-500 text-right md:ml-4">
                        <div>Created: {{ $distance->created_at->format('Y-m-d H:i') }}</div>
                        <div>Modified: {{ $distance->updated_at->format('Y-m-d H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
