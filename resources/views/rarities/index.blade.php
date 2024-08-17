{{-- resources/views/rarities/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rarities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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

                        <a href="{{ route('rarities.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                        Add New Rarity
                    </a>

                    <table class="min-w-full leading-normal mt-6">
                        <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Percent of Total Inventory
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                NFTs Included
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Loyalty Points Earned
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rarities as $rarity)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $rarity->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $rarity->percent_of_total_inventory }}%
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $rarity->nfts_included }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $rarity->loyalty_points_earned }}
                            </td>
                           <!-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('rarities.show', $rarity->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="{{ route('rarities.edit', $rarity->id) }}" class="text-green-600 hover:text-green-900">Edit</a>
                                <form action="{{ route('rarities.destroy', $rarity->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>-->
                            <td class="py-4 px-4">
                                <div class="inline-flex space-x-2">
                                    <a href="{{ route('rarities.show', $rarity->id) }}" class="inline-flex items-center px-2 py-1 bg-gray-200 hover:bg-gray-300 text-black text-xs font-medium rounded-md">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('rarities.edit', $rarity->id) }}" class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-700 text-white text-xs font-medium rounded-md">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('rarities.destroy', $rarity->id) }}" method="POST" class="inline-block">
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
