<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}">
        <title>{{ config('constants.app_name') }} | @yield('title')</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="bg-light p-4">
        <div class="container">
            @yield('content')
        </div>
        @livewireScripts
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
