<div>
    <!-- Items per page selection -->
    <div>
        <label for="perPage">Items per page:</label>
        <select wire:change='updatePageOption' wire:model="perPage" id="perPage">
            @foreach($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>
    <!-- Items list -->
    <div>
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
    <!-- Pagination links -->
    {{ $items->links() }}
</div>
