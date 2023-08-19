@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Book A Car
@endsection

{{-- Main Content --}}
@section('main')

{{-- no logged user --}}
@unless (Auth::check())
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center items-start mx-auto">
            <h1 class="flex-grow sm:pr-16 text-2xl font-medium title-font text-gray-900">
                <span>You need to first </span><a href="{{ route('login') }}">Log in</a> or <a href="{{ route('register') }}">Registration</a></h1>
            <a href="{{ route('login') }}" class="flex-shrink-0 text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mt-10 sm:mt-0">Login</a>&nbsp;&nbsp;
            <a href="{{ route('register') }}" class="flex-shrink-0 text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg mt-10 sm:mt-0">Registration</a>
        </div>
    </div>
</section>
@endunless
{{-- /no logged user --}}


{{-- login user --}}
@auth
@include('content.bookCarForm')
@endauth
{{-- /login user --}}



@endsection
{{-- /Main Content --}}
