<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Points Ledger Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    <form action="{{ route('points_ledgers.update', $pointsLedger->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @php $action = route('points_ledgers.update', $pointsLedger->id); @endphp
                        @include('points_ledgers._form', ['action' => $action])
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-700 text-white text-sm font-medium rounded-md">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
