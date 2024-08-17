<!-- resources/views/collectibles/partials/form.blade.php -->
<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
    @method($method)
    @endisset

    <div class="mt-4">
        <label for="collectible_id" class="block font-medium text-sm text-gray-700">Collectible ID</label>
        <input type="text" name="collectible_id" id="collectible_id" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('collectible_id', $collectible->collectible_id ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $collectible->name ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="rarity_id" class="block font-medium text-sm text-gray-700">Rarity</label>
        <select name="rarity_id" id="rarity_id" class="form-select rounded-md shadow-sm mt-1 block w-full">
            @foreach ($rarities as $rarity)
            <option value="{{ $rarity->id }}" {{ (old('rarity_id', $collectible->rarity_id ?? '') == $rarity->id) ? 'selected' : '' }}>
            {{ $rarity->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <label for="version" class="block font-medium text-sm text-gray-700">Version</label>
        <input type="number" name="version" id="version" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('version', $collectible->version ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="sequence_number" class="block font-medium text-sm text-gray-700">Sequence Number</label>
        <input type="number" name="sequence_number" id="sequence_number" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('sequence_number', $collectible->sequence_number ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="qr_code_id" class="block font-medium text-sm text-gray-700">QR Code ID</label>
        <input type="text" name="qr_code_id" id="qr_code_id" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('qr_code_id', $collectible->qr_code_id ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="loyalty_points" class="block font-medium text-sm text-gray-700">Loyalty Points</label>
        <input type="number" name="loyalty_points" id="loyalty_points" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('loyalty_points', $collectible->loyalty_points ?? 0) }}">
    </div>

    <div class="mt-4">
        <label for="nfts_included" class="block font-medium text-sm text-gray-700">NFTs Included</label>
        <input type="number" name="nfts_included" id="nfts_included" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('nfts_included', $collectible->nfts_included ?? 0) }}">
    </div>

</form>
