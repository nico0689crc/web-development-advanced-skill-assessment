<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col gap-2 p-6">
                    <div class="flex items-center">
                        <h2 class="flex-grow text-xl font-bold line-clamp-1 text-indigo-600">{{ $member->first_name }} {{ $member->last_name }}</h2>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button type="button" class="text-indigo-600 rounded-full p-2 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
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
        </div>
    </div>
</x-app-layout>
