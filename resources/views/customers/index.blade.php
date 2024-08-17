<!-- resources/views/customers/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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

                    <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                        Add New Customer
                    </a>

                    <table class="min-w-full bg-white border border-gray-200 mt-4">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Customer ID') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Email') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Phone') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Loyalty Tier') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Total Base Points') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Total Redeemable Points') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Points Balance') }}</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($customers as $customer)
                        <tr>
                            <td class="py-4 px-4">{{ $customer->customer_id }}</td>
                            <td class="py-4 px-4">{{ $customer->name }}</td>
                            <td class="py-4 px-4">{{ $customer->email }}</td>
                            <td class="py-4 px-4">{{ $customer->phone }}</td>
                            <td class="py-4 px-4">{{ $customer->loyalty_tier }}</td>
                            <td class="py-4 px-4">{{ $customer->total_base_points }}</td>
                            <td class="py-4 px-4">{{ $customer->total_redeemable_points }}</td>
                            <td class="py-4 px-4">{{ $customer->points_balance }}</td>
                            <td class="py-4 px-4">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('customers.show', $customer->id) }}" class="inline-flex items-center px-2 py-1 bg-gray-200 hover:bg-gray-300 text-black text-xs font-medium rounded-md">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-700 text-white text-xs font-medium rounded-md">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
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
