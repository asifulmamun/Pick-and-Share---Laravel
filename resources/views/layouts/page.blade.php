<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pgTitle')</title>

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css')
</head>

<body class="min-h-screen bg-gray-100">
    {{-- <x-jet-banner /> --}}
    {{-- @livewire('navigation-menu') --}}

    {{-- Header --}}
    @include('includes.header')
    @yield('pgAfterHeader')


    <!-- Page Content -->
    <main>
        @yield('main')
    </main>
    @yield('pgAfterMain')
    
    {{-- Footer --}}
    @include('includes.footer')
    @yield('pgAfterFooter')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>