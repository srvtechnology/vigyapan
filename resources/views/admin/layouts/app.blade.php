<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <title>{{ config('app.name', 'Laravel') }} :: Admin</title> --}}
        @yield('title')
           @yield('style')
        <!-- Scripts -->
        {{--  <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
        {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        @yield('head')
    </head>
<body class="fixed-left">
    <div id="wrapper">
        @yield('content')
    </div>

    <div class="wrapper-page">
        @yield('body')
    </div>


   @yield('script')

</body>
</html>