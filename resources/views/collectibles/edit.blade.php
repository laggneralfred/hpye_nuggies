<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Collectible') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('collectibles.update', $collectible->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('collectibles._form', [
                        'action' => route('collectibles.update', $collectible->id), // PUT method for update
                        'method' => 'PUT'
                        ])

                        <div class="mt-4">
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
