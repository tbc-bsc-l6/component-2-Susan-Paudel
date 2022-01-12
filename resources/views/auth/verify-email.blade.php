<!--layout -->
<x-guest-layout>
    <!--card-->
    <x-auth-card>
        <!--logo -->
        <x-slot name="logo">
            <a class="navbar-brand" href="/"
                style="color:#232f3e;font-family: 'Lobster', cursive;font-size:30px;">leedsshop</a>
        </x-slot>
        <!--Message -->
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
        <!--session content -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <!--form -->
            <form method="POST" action="{{ route('verification.send') }}">
                <!--create token -->
                @csrf
                <!--resend varification button-->
                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
                <!--end form -->
            </form>
            <!--form for logout button -->
            <form method="POST" action="{{ route('logout') }}">
                <!--token create -->
                @csrf
                <!--button -->
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
                <!--end form -->
            </form>
        </div>
        <!--end card -->
    </x-auth-card>
    <!--error layout -->
</x-guest-layout>
