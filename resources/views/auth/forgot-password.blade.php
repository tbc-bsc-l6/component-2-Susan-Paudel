<!--layout -->
<x-guest-layout>
    <!--card -->
    <x-auth-card>
        <!--logo -->
        <x-slot name="logo">
            <a class="navbar-brand" href="/navbody" style="color:#232f3e;font-family: 'Lobster', cursive;font-size:30px;">leedsshop</a>
        </x-slot>
      <!--message -->
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!--form-->
        <form method="POST" action="{{ route('password.email') }}">
            <!--make token with hidden type -->
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <!--reset password buton -->
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
            <!--form close-->
        </form>
        <!--end card -->
    </x-auth-card>
    <!--end layout -->
</x-guest-layout>
