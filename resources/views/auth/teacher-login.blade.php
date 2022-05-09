<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <div class=" w-full flex justify-between items-center px-5 select-none relative">
            <form action="{{ route('teacher.check') }}" method="post" class="w-full ">
                    @csrf
                    <div>
                         <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <x-jet-button class="ml-4 absolute right-2 bottom-2">
                        {{ __('Login') }}
                    </x-jet-button>
            </form>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
