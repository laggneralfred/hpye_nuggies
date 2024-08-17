<!-- resources/views/customers/partials/form.blade.php -->
<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
    @method($method)
    @endisset

    <div class="mt-4">
        <label for="customer_id" class="block font-medium text-sm text-gray-700">Customer ID</label>
        <input type="text" name="customer_id" id="customer_id" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('customer_id', $customer->customer_id ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name', $customer->name ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('email', $customer->email ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="phone" class="block font-medium text-sm text-gray-700">Phone</label>
        <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('phone', $customer->phone ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="total_base_points" class="block font-medium text-sm text-gray-700">Total Base Points</label>
        <input type="number" name="total_base_points" id="total_base_points" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('total_base_points', $customer->total_base_points ?? 0) }}">
    </div>

    <div class="mt-4">
        <label for="total_redeemable_points" class="block font-medium text-sm text-gray-700">Total Redeemable Points</label>
        <input type="number" name="total_redeemable_points" id="total_redeemable_points" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('total_redeemable_points', $customer->total_redeemable_points ?? 0) }}">
    </div>

    <div class="mt-4">
        <label for="loyalty_tier" class="block font-medium text-sm text-gray-700">Loyalty Tier</label>
        <select name="loyalty_tier" id="loyalty_tier" class="form-select rounded-md shadow-sm mt-1 block w-full">
            <option value="Bronze" {{ (old('loyalty_tier', $customer->loyalty_tier ?? '') == 'Bronze' ? 'selected' : '') }}>Bronze</option>
            <option value="Silver" {{ (old('loyalty_tier', $customer->loyalty_tier ?? '') == 'Silver' ? 'selected' : '') }}>Silver</option>
            <option value="Gold" {{ (old('loyalty_tier', $customer->loyalty_tier ?? '') == 'Gold' ? 'selected' : '') }}>Gold</option>
            <option value="Platinum" {{ (old('loyalty_tier', $customer->loyalty_tier ?? '') == 'Platinum' ? 'selected' : '') }}>Platinum</option>
        </select>
    </div>

    <div class="mt-4">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
            Save
        </button>
    </div>
</form>
