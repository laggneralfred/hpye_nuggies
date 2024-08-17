<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Points Ledger') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <a href="{{ route('points_ledgers.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                        Add New Entry
                    </a>

                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Transaction ID') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Customer ID') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Date') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Transaction Type') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Points') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Base Points') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Redeemable Points') }}</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($points_ledgers as $ledger)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $ledger->transaction_id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $ledger->customer_id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $ledger->date ? $ledger->date->format('Y-m-d') : 'No date provided' }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $ledger->transaction_type }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $ledger->points }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $ledger->base_points_balance }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $ledger->redeemable_points_balance }}</td>
<!--                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('points_ledgers.show', $ledger->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="{{ route('points_ledgers.edit', $ledger->id) }}" class="text-green-600 hover:text-green-900">Edit</a>
                                <form action="{{ route('points_ledgers.destroy', $ledger->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
-->                            <td class="py-4 px-4">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('points_ledgers.show', $ledger->id) }}" class="inline-flex items-center px-2 py-1 bg-gray-200 hover:bg-gray-300 text-black text-xs font-medium rounded-md">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('points_ledgers.edit', $ledger->id) }}" class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-700 text-white text-xs font-medium rounded-md">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('points_ledgers.destroy', $ledger->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 py-1 bg-red-500 hover:bg-red-700 text-white text-xs font-medium rounded-md">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
