<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 text-center">
                    <h3 class="text-2xl font-bold mb-4">{{ __("You're logged in!") }}</h3>
                    <a href="{{ route('periodebs-list') }}" role="button" class="btn btn-success bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
