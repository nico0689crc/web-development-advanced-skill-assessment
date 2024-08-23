<nav x-data="{ open: false }" class="bg-white border-b border-indigo-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('members.index', ['token' => $token]) }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-indigo-800" :$token/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 md:flex">
                    <x-nav-link :href="route('members.index', ['token' => $token])" :active="request()->routeIs('members.index')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about-us', ['token' => $token])" :active="request()->routeIs('about-us')">
                        {{ __('About us') }}
                    </x-nav-link>
                    @if($user->isAdministrator())
                        <x-nav-link :href="route('members.create', ['token' => $token])" :active="request()->routeIs('members.create')">
                            {{ __('New member') }}
                        </x-nav-link>
                    @endif
                    <x-nav-link :href="route('events', ['token' => $token])" :active="request()->routeIs('events')">
                        {{ __('Events') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-500 bg-white hover:text-indigo-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ $user->getFullName() }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('logout', ['token' => $token])">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-indigo-400 hover:text-indigo-500 hover:bg-indigo-100 focus:outline-none focus:bg-indigo-100 focus:text-indigo-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')">
                {{ __('About us') }}
            </x-responsive-nav-link>
            @if($user->isAdministrator())
                <x-responsive-nav-link :href="route('members.create')" :active="request()->routeIs('members.create')">
                    {{ __('New member') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('events')" :active="request()->routeIs('events')">
                {{ __('Events') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-indigo-200">
            <div class="px-4">
                <div class="font-medium text-base text-indigo-800">{{ $user->getFullName() }}</div>
                <div class="font-medium text-sm text-indigo-500">{{ $user->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-dropdown-link :href="route('logout', ['token' => $token])">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </div>
        </div>
    </div>
</nav>
