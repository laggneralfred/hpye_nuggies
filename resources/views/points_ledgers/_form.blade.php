<!-- resources/views/points_ledgers/partials/_form.blade.php -->
<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
    @method($method)
    @endisset

    <div class="mt-4">
        <label for="transaction_id" class="block font-medium text-sm text-gray-700">Transaction ID</label>
        <input type="text" name="transaction_id" id="transaction_id" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('transaction_id', $ledger->transaction_id ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="customer_id" class="block font-medium text-sm text-gray-700">Customer ID</label>
        <input type="number" name="customer_id" id="customer_id" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('customer_id', $ledger->customer_id ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="date" class="block font-medium text-sm text-gray-700">Date</label>
        <input type="date" name="date" id="date" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('date', $ledger->date ?? '') }}">
    </div>

    <div class="mt-4">
        <label for="transaction_type" class="block font-medium text-sm text-gray-700">Transaction Type</label>
        <select name="transaction_type" id="transaction_type" class="form-select rounded-md shadow-sm mt-1 block w-full">
            <option value="">Select a Type</option>
            <option value="credit" {{ (old('transaction_type', $ledger->transaction_type ?? '') == 'credit' ? 'selected' : '') }}>Credit</option>
            <option value="debit" {{ (old('transaction_type', $ledger->transaction_type ?? '') == 'debit' ? 'selected' : '') }}>Debit</option>
        </select>
    </div>

    <div class="mt-4">
        <label for="points" class="block font-medium text-sm text-gray-700">Points</label>
        <input type="number" name="points" id="points" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('points', $ledger->points ?? 0) }}">
    </div>

    <div class="mt-4">
        <label for="base_points_balance" class="block font-medium text-sm text-gray-700">Base Points Balance</label>
        <input type="number" name="base_points_balance" id="base_points_balance" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('base_points_balance', $ledger->base_points_balance ?? 0) }}">
    </div>

    <div class="mt-4">
        <label for="redeemable_points_balance" class="block font-medium text-sm text-gray-700">Redeemable Points Balance</label>
        <input type="number" name="redeemable_points_balance" id="redeemable_points_balance" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('redeemable_points_balance', $ledger->redeemable_points_balance ?? 0) }}">
    </div>

    <div class="mt-4">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
            Save
        </button>
    </div>
</form>
