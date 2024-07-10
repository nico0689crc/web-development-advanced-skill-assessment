<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-6">
                        <h1 class="text-2xl font-bold mb-4">{{ $member->first_name }} {{ $member->last_name }}</h1>
                        <p class="text-gray-700 mb-2"><strong>Age:</strong> {{ $member->age }}</p>
                        <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $member->email }}</p>
                        <p class="text-gray-700 mb-2"><strong>Phone:</strong> {{ $member->phone }}</p>
                        <p class="text-gray-700 mb-2"><strong>Address:</strong> {{ $member->address }}</p>
                        <p class="text-gray-700 mb-2"><strong>Professional Summary:</strong> {{ $member->professional_summary }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
