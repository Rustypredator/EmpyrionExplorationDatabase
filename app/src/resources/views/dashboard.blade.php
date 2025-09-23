<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 p-6">
                @livewire('frontend.location.counter-card')
                @livewire('frontend.entry.counter-card')
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 p-6">
                <a href="{{ route('frontend.location.create') }}" class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-300 transition">Add Location</a>
                <a href="{{ route('frontend.entry.create') }}" class="flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-300 transition">Add Entry</a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @livewire('frontend.search')
            </div>
        </div>
    </div>
</x-app-layout>
