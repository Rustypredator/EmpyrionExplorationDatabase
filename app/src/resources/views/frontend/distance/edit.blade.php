<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }} {{ __('Distance') }}: {{ $distance->from_location->name }} -> {{ $distance->to_location->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            @livewire('frontend.distance.form', ['distance' => $distance])
        </div>
    </div>
</x-app-layout>
