{{-- resources/views/rarities/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Rarity') }} - {{ $rarity->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <strong>Name:</strong> {{ $rarity->name }}
                        </div>
                        <div class="mb-4">
                            <strong>Percent of Total Inventory:</strong> {{ $rarity->percent_of_total_inventory }}%
                        </div>
                        <div class="mb-4">
                            <strong>NFTs Included:</strong> {{ $rarity->nfts_included }}
                        </div>
                        <div class="mb-4">
                            <strong>Loyalty Points Earned:</strong> {{ $rarity->loyalty_points_earned }}
                        </div>
                    </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('rarities.edit', $rarity->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                        Edit Rarity
                    </a>
                    <a href="{{ route('rarities.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-black text-sm font-medium rounded-md">
                        Back to Rarity
                    </a>
                    <form action="{{ route('rarities.destroy', $rarity->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                            Delete Rarity
                        </button>
                    </form>
                </div>
            </div>
            </div>

        </div>
    </div>
</x-app-layout>
