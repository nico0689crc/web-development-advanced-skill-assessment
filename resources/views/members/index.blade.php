<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
            {{ __('Members Lis sss dddd') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-4 sm:mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($members as $member)
                    <div class="flex flex-col gap-5 border border-indigo-400 bg-white shadow-md rounded-lg p-6">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <a class="flex-grow text-xl font-bold line-clamp-1" href={{route('members.show', $member->uuid)}}>
                                    <h2 class="text-indigo-600 underline">{{ $member->first_name }} {{ $member->last_name }}</h2>
                                </a>
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button type="button" class="text-indigo-600 rounded-full p-2 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('members.show', $member->uuid)">
                                            {{ __('Show') }}
                                        </x-dropdown-link>

                                        <x-dropdown-link :href="route('members.edit', $member->uuid)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('members.destroy', $member->uuid) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-dropdown-link :href="route('members.destroy', $member->uuid)"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                            <div class="flex gap-1">
                                <span class="text-base font-medium">Age:</span>
                                <p class="text-base text-gray-600 line-clamp-1">{{ $member->age }}</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-base font-medium">Email</span>
                                <p class="text-base text-gray-600 line-clamp-1">{{ $member->email }}</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-base font-medium">Phone</span>
                                <p class="text-base text-gray-600 line-clamp-1">{{ $member->phone }}</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-base font-medium">Address</span>
                                <p class="text-base text-gray-600 line-clamp-1">{{ $member->address }}</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-base font-medium">Professional Summary</span>
                                <p class="text-base text-gray-600 text-justify line-clamp-4">{{ $member->professional_summary }}</p>
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
