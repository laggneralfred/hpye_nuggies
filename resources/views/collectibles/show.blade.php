<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Collectible') }} - {{ $collectible->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <strong>{{ __('Collectible ID:') }}</strong> {{ $collectible->collectible_id ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Name:') }}</strong> {{ $collectible->name ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Rarity:') }}</strong> {{ $collectible->rarity ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Version:') }}</strong> {{ $collectible->version ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Sequence Number:') }}</strong> {{ $collectible->sequence_number ?? '0' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('QR Code ID:') }}</strong> {{ $collectible->qr_code_id ?? 'N/A' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('Loyalty Points:') }}</strong> {{ $collectible->loyalty_points ?? '0' }}
                        </div>
                        <div class="mb-4">
                            <strong>{{ __('NFTs Included:') }}</strong> {{ $collectible->nfts_included ?? '0' }}
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('collectibles.edit', $collectible->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                            Edit Collectible
                        </a>
                        <a href="{{ route('collectibles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-black text-sm font-medium rounded-md">
                            Back to Collectibles
                        </a>
                        <form action="{{ route('collectibles.destroy', $collectible->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                Delete Collectible
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
