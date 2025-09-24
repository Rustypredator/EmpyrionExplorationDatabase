<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Location') }} {{ $location->name }}
            </h2>
            <a href="{{ route('frontend.location.edit', $location) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Location
            </a>
        </div>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Left: Basic Info -->
                <div class="md:col-span-2">
                    <div class="flex justify-between items-start">
                        <div>
                            <small>Name:</small>&nbsp;<b>{{ $location->name }}</b><br/>
                            <small>Type:</small>&nbsp;{{ ucfirst($location->type) }}<br/>
                            <small>Coords:</small>&nbsp;{{ $location->x ?? '-' }}, {{ $location->y ?? '-' }}, {{ $location->z ?? '-' }}<br/>
                            @if (!is_null($location->parent))
                                <small>Parent:</small>&nbsp;
                                <a href="{{ route('frontend.location.show', $location->parent) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    {{ $location->parent->name }}
                                </a><br/>
                            @endif
                        </div>
                        <!-- Top right: Timestamps -->
                        <div class="text-xs text-gray-400 dark:text-gray-500 text-right md:ml-4">
                            <div>Created: {{ $location->created_at->format('Y-m-d H:i') }}</div>
                            <div>Modified: {{ $location->updated_at->format('Y-m-d H:i') }}</div>
                        </div>
                    </div>
                    <!-- Description below basic info -->
                    <div class="mt-6">
                        <small>Description:</small>
                        <div class="mt-1">{{ $location->description }}</div>
                    </div>
                </div>
                <!-- Right: Children -->
                <div>
                    <!-- Child Locations -->
                    <div class="mb-2 font-semibold text-gray-700 dark:text-gray-200">
                        Child Locations
                        <a href="{{ route('frontend.location.create', $location) }}" class="mt-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">+</a>
                    </div>
                    <ul class="list-disc list-inside">
                        @forelse($location->children as $child)
                            <li>
                                <a href="{{ route('frontend.location.show', $child) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    {{ ucfirst($child->type) }} - {{ $child->name }}
                                </a>
                            </li>
                        @empty
                            <li class="text-gray-400 dark:text-gray-500">No children</li>
                        @endforelse
                    </ul>
                    <!-- Child Entries -->
                    <div class="mb-2 font-semibold text-gray-700 dark:text-gray-200 mt-6">
                        Child Entries
                        <a href="{{ route('frontend.entry.create', $location) }}" class="mt-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">+</a>
                    </div>
                    <ul class="list-disc list-inside">
                        @forelse($location->entries as $entry)
                            <li>
                                <a href="{{ route('frontend.entry.show', $entry) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    {{ $entry->name }}
                                </a>
                            </li>
                        @empty
                            <li class="text-gray-400 dark:text-gray-500">No entries</li>
                        @endforelse
                    </ul>
                    <!-- Neighbor Locations -->
                    <div class="mb-2 font-semibold text-gray-700 dark:text-gray-200 mt-6">
                        Neighbor Locations
                    </div>
                    <ul class="list-disc list-inside">
                        @forelse($location->neighbors as $neighbor)
                            <li>
                                <a href="{{ route('frontend.location.show', $neighbor) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    {{ ucfirst($neighbor->type) }} - {{ $neighbor->name }} 
                                </a>
                                ({{ $location->distanceTo($neighbor) }})
                            </li>
                        @empty
                            <li class="text-gray-400 dark:text-gray-500">No known neighbors</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
