<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Collectibles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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

                        <a href="{{ route('collectibles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                        Add New Collectible
                    </a>

                    <table class="min-w-full leading-normal mt-4">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Collectible ID</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rarity</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Version</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sequence Number</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">QR Code ID</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Loyalty Points</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NFTs Included</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($collectibles as $collectible)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->collectible_id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->rarity }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->version }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->sequence_number }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->qr_code_id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->loyalty_points }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $collectible->nfts_included }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('collectibles.show', $collectible->id) }}" class="inline-flex items-center px-2 py-1 bg-gray-200 hover:bg-gray-300 text-black text-xs font-medium rounded-md">
                                        View
                                    </a>
                                    <a href="{{ route('collectibles.edit', $collectible->id) }}" class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-700 text-white text-xs font-medium rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('collectibles.destroy', $collectible->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 py-1 bg-red-500 hover:bg-red-700 text-white text-xs font-medium rounded-md" onclick="return confirm('Are you sure?')">
                                            Delete
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
