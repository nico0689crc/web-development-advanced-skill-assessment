<x-app-layout :$token :$user>
    <div class="py-12">
        <div class="max-w-7xl mx-4 sm:mx-auto sm:px-6 lg:px-8 claaaaas">
            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @endif
            <x-grid-card>
                @foreach ($members as $member)
                    <x-card>
                        <div class="flex items-center">
                            <a class="flex-grow text-xl font-bold line-clamp-1" href={{route('members.show', ['uuid' => $member->uuid, 'token' => $token])}}>
                                <h2 class="text-indigo-600 underline">{{ $member->user->first_name }} {{ $member->user->last_name }}</h2>
                            </a>
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button type="button" class="text-indigo-600 rounded-full p-2 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('members.show', ['uuid' => $member->uuid, 'token' => $token])">
                                        {{ __('Show') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('members.edit', ['uuid' => $member->uuid, 'token' => $token])">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
            
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('members.destroy', $member->uuid) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value={{ $token }} name="token">
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
                            <p class="text-base text-gray-600 line-clamp-1">{{ $member->user->email }}</p>
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
                    </x-card>
                @endforeach
            </x-grid-card>
        </div>
    </div>
</x-app-layout>
