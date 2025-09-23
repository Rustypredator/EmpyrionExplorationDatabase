<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }} {{ __('Entry') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            @livewire('frontend.entry.form', ['entry' => null, 'parentId' => $parentId ?? null])
        </div>
    </div>
</x-app-layout>
