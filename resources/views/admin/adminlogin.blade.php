 <!-- guest-layout -->
<x-guest-layout>
     <!-- auth-card -->
    <x-auth-card>
        <!--logo display-->
        <x-slot name="logo">
            <a class="navbar-brand" href="/navbody" style="color:#232f3e;font-family: 'Lobster', cursive;font-size:30px;">leedsshop</a>
            Admin Login
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!--form with method and action-->
        <form method="POST" action="{{ route('admin.adminlogin') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="d-flex justify-content-between">
                    <x-label for="password" :value="__('Password')" /> 
               
                <i class="fa fa-eye" aria-hidden="true" onclick="myFunction()"></i>
                </div>
               

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
           
            
            <!--script to make password input type text or password-->
            <script>
                function myFunction() {
                    var x = document.getElementById("password");
                    //if eye option is clicked then password will converted into text
                    if (x.type === "password") {
                        x.type = "text";
                    }
                    //else input field is password 
                    else {
                        x.type = "password";
                    }
                }
            </script>

            <!-- Remember Me -->

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
             <!-- End form -->
        </form>
         <!-- end auth card -->
    </x-auth-card>
<!-- End-guest-layout -->
</x-guest-layout>
