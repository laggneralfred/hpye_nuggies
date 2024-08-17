{{-- resources/views/rarities/partials/_form.blade.php --}}

<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
    @method($method)
    @endisset

    <div class="mt-4">
        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $rarity->name ?? '') }}" required>
        @error('name')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-4">
        <label for="percent_of_total_inventory" class="block font-medium text-sm text-gray-700">Percent of Total Inventory</label>
        <input type="number" name="percent_of_total_inventory" id="percent_of_total_inventory" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('percent_of_total_inventory', $rarity->percent_of_total_inventory ?? '') }}" required>
        @error('percent_of_total_inventory')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-4">
        <label for="nfts_included" class="block font-medium text-sm text-gray-700">NFTs Included</label>
        <input type="number" name="nfts_included" id="nfts_included" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('nfts_included', $rarity->nfts_included ?? 0) }}">
        @error('nfts_included')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-4">
        <label for="loyalty_points_earned" class="block font-medium text-sm text-gray-700">Loyalty Points Earned</label>
        <input type="number" name="loyalty_points_earned" id="loyalty_points_earned" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('loyalty_points_earned', $rarity->loyalty_points_earned ?? 0) }}">
        @error('loyalty_points_earned')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
            Save
        </button>
    </div>
</form>
