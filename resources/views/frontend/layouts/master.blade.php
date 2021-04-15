<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
        @yield('before-head')
    </head>
    <body class="antialiased">

        <!-- Header Section -->
        @include('frontend.partials._header')

        <main>

            @yield('main')

        </main>

        <!-- Start Footer section -->
        @include('frontend.partials._footer')

        <script src="{{ asset('public/js/app.js') }}"></script>
        @yield('before-body')
    </body>
</html>
