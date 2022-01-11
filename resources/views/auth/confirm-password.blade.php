<!--layout -->
<x-guest-layout>
    <!--card -->
    <x-auth-card>
        <!--display logo-->
        <x-slot name="logo">
            <a class="navbar-brand" href="/navbody" style="color:#232f3e;font-family: 'Lobster', cursive;font-size:30px;">leedsshop</a>
        </x-slot>
        <!--display messsage -->
        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
         <!--form -->
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <!--button-->
            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
            <!--end form -->
        </form>
        <!--end card -->
    </x-auth-card>
    <!--end layout -->
</x-guest-layout>
