<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{env('APPLICATION_ADMIN_EMAIL')}}" autofocus  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            value="{{env('APPLICATION_PASSWORD')}}" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <div class="flex flex-col py-4">
        <p><b>Administrator's email:</b> {{ env('APPLICATION_ADMIN_EMAIL') }}</p>    
        <p><b>Administrator's password:</b> {{ env('APPLICATION_PASSWORD') }}</p>    
        <p><b>Member's email:</b> {{ env('APPLICATION_MEMBER_EMAIL') }}</p>    
        <p><b>Member's password:</b> {{ env('APPLICATION_PASSWORD') }}</p>    
    </div> 
</x-guest-layout>
