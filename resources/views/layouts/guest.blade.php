<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="/css/style.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>
    </head>
    <body>
        @include('own.nav')
       
            <div class="font-sans text-gray-900 antialiased">
                <div class="pb-4" style="background:#f1f4f7;">
                {{ $slot }}
               </div>
           </div>
       
        @include('own.footer')
        <script src={{asset('/bootstrap/js/bootstrap.bundle.min.js')}}></script>
    </body>
</html>