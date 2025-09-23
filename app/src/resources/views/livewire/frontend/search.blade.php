<div>
    <input type="text" wire:model.live="query" placeholder="Search..." class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded mb-4 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500" />
    <div id="results">
        @if($results)
            <ul class="space-y-2">
                @foreach($results as $groupLabel => $group)
                    @foreach ($group as $result)
                        <li class="p-4 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700">
                            @if ($groupLabel === 'locations')
                                <a href="{{ route('frontend.location.show', $result) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    Location: {{ $result->name }} ({{ ucfirst($result->type) }})
                                </a>
                            @elseif ($groupLabel === 'entries')
                                <a href="{{ route('frontend.entry.show', $result) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 font-bold">
                                    Entry: {{ $result->name }} ({{ ucfirst($result->type) }})
                                </a>
                            @endif
                    @endforeach
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 dark:text-gray-400">No results found.</p>
        @endif
    </div>
</div>
