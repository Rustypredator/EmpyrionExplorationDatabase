<div class="space-y-6">
    <!-- Searchable select for parent_id -->
    <div>
        <label for="parent_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Parent Location</label>
        <select id="parent_id" wire:model="parent_id" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
            <option value="">None</option>
            @foreach($parentLocations as $parentLocation)
                <option value="{{ $parentLocation->id }}" {{ $parentLocation->id === $parent_id ? 'selected' : '' }}>{{ $parentLocation->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Select for type -->
    <div>
        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Type</label>
        <select id="type" wire:model="type" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
            <option value="">Select type</option>
            <option value="system" {{ $type === 'system' ? 'selected' : '' }}>System</option>
            <option value="sector" {{ $type === 'sector' ? 'selected' : '' }}>Sector</option>
            <option value="planet" {{ $type === 'planet' ? 'selected' : '' }}>Planet</option>
        </select>
    </div>
    <!-- Input for name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Name</label>
        <input id="name" type="text" wire:model="name" value="{{$name}}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" placeholder="Enter location name" />
    </div>
    <!-- Three inputs for coordinates: x, y, z -->
    <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
            <label for="coordinate_x" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Coordinate X</label>
            <input id="coordinate_x" type="number" step="0.01" wire:model="x" value="{{$x}}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" placeholder="X" />
        </div>
        <div class="flex-1">
            <label for="coordinate_y" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Coordinate Y</label>
            <input id="coordinate_y" type="number" step="0.01" wire:model="y" value="{{$y}}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" placeholder="Y" />
        </div>
        <div class="flex-1">
            <label for="coordinate_z" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Coordinate Z</label>
            <input id="coordinate_z" type="number" step="0.01" wire:model="z" value="{{$z}}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" placeholder="Z" />
        </div>
    </div>
    <!-- Textfield for description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Description</label>
        <textarea id="description" wire:model="description" rows="4" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" placeholder="Enter description">{{$description}}</textarea>
    </div>
    <!-- Save button -->
    <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-300 transition">Save</button>
</div>
