<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($members as $member)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-2">{{ $member->first_name }} {{ $member->last_name }}</h2>
                            <p class="text-gray-700 mb-2">Age: {{ $member->age }}</p>
                            <p class="text-gray-700 mb-2">Email: {{ $member->email }}</p>
                            <p class="text-gray-700 mb-2">Phone: {{ $member->phone }}</p>
                            <p class="text-gray-700 mb-2">Address: {{ $member->address }}</p>
                            <p class="text-gray-700 mb-4">Professional Summary: {{ $member->professional_summary }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('members.show', $member->id) }}" class="text-blue-500">Show</a>
                                <a href="{{ route('members.edit', $member->id) }}" class="text-yellow-500">Edit</a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Agregar Paginación -->
            <div class="mt-6">
                {{ $members->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
