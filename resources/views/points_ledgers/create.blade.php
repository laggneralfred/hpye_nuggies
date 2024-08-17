<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Points Ledger Entry') }}
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
                    <form action="{{ route('points_ledgers.store') }}" method="POST">
                        @csrf
                        @php $action = route('points_ledgers.store'); @endphp
                        @include('points_ledgers._form', ['action' => $action])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
