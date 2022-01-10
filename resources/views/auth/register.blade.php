<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a class="navbar-brand" href="/navbody" style="color:#232f3e;font-family: 'Lobster', cursive;font-size:30px;">leedsshop</a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="mt-4">
                <x-label for="phonenumber" :value="__('Phonenumber')" />

                <x-input id="phonenumber" class="block mt-1 w-full" type="text" name="phonenumber" :value="old('phonenumber')" required />
            </div>
            <div class="mt-4">
                <x-label for="location" :value="__('Location')" />

                <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            <div>
                <p class="text-lead pt-3 ps-4">Password must contains</p>
                <ul class="row">
                    <li class="col-6 list-group-item border-0">at least 8 characters.</li>
                    <li class="col-6 list-group-item border-0">at least one uppercase</li>
                    <li class="col-6 list-group-item border-0">at least one lowercase</li>
                    <li class="col-6 list-group-item border-0">at least one number</li>
                    <li class="col-12 list-group-item border-0">at least one symbol[ !, $, #, or %]</li>
                </ul>
                </div>
        </form>
    </x-auth-card>
</x-guest-layout>
