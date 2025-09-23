<div class="space-y-6">
    <!-- Searchable select for parent_id -->
    <div>
        <label for="from_location_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">From Location</label>
        <select id="from_location_id" wire:model="from_location_id" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
            <option value="">None</option>
            @foreach($possibleLocations as $location)
                <option value="{{ $location->id }}" {{ $location->id === $from_location_id ? 'selected' : '' }}>{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Searchable select for to_location -->
    <div>
        <label for="to_location_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">To Location</label>
        <select id="to_location_id" wire:model="to_location_id" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
            <option value="">None</option>
            @foreach($possibleLocations as $location)
                <option value="{{ $location->id }}" {{ $location->id === $to_location_id ? 'selected' : '' }}>{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Input for distance -->
    <div>
        <label for="distance_value" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Distance</label>
        <input id="distance_value" type="text" wire:model="distance_value" value="{{$distance_value}}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" placeholder="Enter distance" />
    </div>
    <!-- Save button -->
    <button wire:click="save" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-300 transition">Save</button>
</div>
