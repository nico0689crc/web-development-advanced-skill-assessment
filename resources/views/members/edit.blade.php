<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
            {{ __('Edit member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-4 sm:mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <section class="flex flex-col gap-4">
                    <header>
                        <h2 class="text-lg font-medium text-indigo-700">
                            {{ __('Edit member') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Edit a member into our system.') }}
                        </p>
                    </header>
                
                    <form method="post" action="{{ route('members.update', $member->uuid) }}" class="grid grid-cols-4 gap-4">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col gap-1 col-span-4 md:col-span-2">
                            <x-input-label for="first_name" :value="__('First name')" />
                            <x-text-input id="first_name" name="first_name" type="text" class="w-full" value="{{ old('first_name', $member->user->first_name) }}" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <div class="flex flex-col gap-1 col-span-4 md:col-span-2">
                            <x-input-label for="last_name" :value="__('Last name')" />
                            <x-text-input id="last_name" name="last_name" type="text" class="w-full" value="{{ old('last_name', $member->user->last_name) }}" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <div class="flex flex-col gap-1 col-span-4">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="w-full" value="{{ old('address', $member->address) }}" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div class="flex flex-col gap-1 col-span-4 md:col-span-2">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="w-full" value="{{ old('email', $member->user->email) }}" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex flex-col gap-1 col-span-4 md:col-span-1">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" name="phone" type="text" class="w-full" value="{{ old('phone', $member->phone) }}" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div class="flex flex-col gap-1 col-span-4 md:col-span-1">
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" name="age" type="text" class="w-full" value="{{ old('age', $member->age) }}" />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>

                        <div class="flex flex-col gap-1 col-span-4">
                            <x-input-label for="professional_summary" :value="__('Professional Summary')" />
                            <x-text-area id="professional_summary" name="professional_summary" type="text" class="w-full" :value="old('professional_summary', $member->professional_summary)" />
                            <x-input-error :messages="$errors->get('professional_summary')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Edit member') }}</x-primary-button>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>