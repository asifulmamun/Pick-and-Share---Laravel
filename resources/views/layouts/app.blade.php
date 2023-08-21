@extends('layouts.page')


{{-- Page Titile --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- BreadCrumb/Header --}}
@isset($header)
@section('pgAfterHeader')
<!-- BreadCrumb-->
<section class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header ?? '' }}
        @if(auth()->check()) <!-- Check if the user is logged in -->
            <p>Welcome, {{ auth()->user()->name }}!&nbsp;&nbsp;Your user ID is: {{ auth()->user()->id }}!&nbsp;&nbsp;Your role is:
            @if (auth()->user()->role == 1)
                ADMIN
            @elseif (auth()->user()->role == 2)
                DRIVER&nbsp;|&nbsp;<a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="{{ route('driver.profile') }}">Driver Profile</a>&nbsp;&nbsp;<a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="{{ route('dashboard') }}">Main Dashboard</a>
            @else   
                USER
            @endif
            

        </p>
        @endif
    </div>
</section>
@endsection
@endisset



{{-- Body --}}
@section('main')
{{ $slot ?? '' }}
@endsection



{{-- app.blade.require for livewere form data coming --}}
@section('pgAfterFooter')
@stack('modals')
@livewireScripts
@endsection