<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Points Ledger Entry') }} - {{ $pointsLedger->transaction_id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <strong>Transaction ID:</strong>
                            <p>{{ $pointsLedger->transaction_id }}</p>
                        </div>
                        <div>
                            <strong>Customer ID:</strong>
                            <p>{{ $pointsLedger->customer_id }}</p>
                        </div>
                        <div>
                            <strong>Date:</strong>
                            <p>{{ $pointsLedger->date ? $pointsLedger->date->format('Y-m-d') : 'N/A' }}</p>
                        </div>
                        <div>
                            <strong>Transaction Type:</strong>
                            <p>{{ $pointsLedger->transaction_type }}</p>
                        </div>
                        <div>
                            <strong>Points:</strong>
                            <p>{{ $pointsLedger->points }}</p>
                        </div>
                        <div>
                            <strong>Base Points Balance:</strong>
                            <p>{{ $pointsLedger->base_points_balance }}</p>
                        </div>
                        <div>
                            <strong>Redeemable Points Balance:</strong>
                            <p>{{ $pointsLedger->redeemable_points_balance }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('points_ledgers.edit', $pointsLedger->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md text-sm font-medium">
                            Edit Entry
                        </a>
                        <a href="{{ route('points_ledgers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-black text-sm font-medium rounded-md">
                            Back to Point Ledger
                        </a>
                        <form action="{{ route('points_ledgers.destroy', $pointsLedger->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                Delete Ledger
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
