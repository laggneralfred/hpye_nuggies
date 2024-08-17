<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Customer') }} - {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <strong>{{ __('Customer ID:') }}</strong> {{ $customer->customer_id ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Name:') }}</strong> {{ $customer->name ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Email:') }}</strong> {{ $customer->email ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Phone:') }}</strong> {{ $customer->phone ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Total Base Points:') }}</strong> {{ $customer->total_base_points ?? '0' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Total Redeemable Points:') }}</strong> {{ $customer->total_redeemable_points ?? '0' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Loyalty Tier:') }}</strong> {{ $customer->loyalty_tier ?? 'Bronze' }}
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                            Edit Customer
                        </a>
                        <a href="{{ route('customers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-black text-sm font-medium rounded-md">
                            Back to Customers
                        </a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                Delete Customer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
