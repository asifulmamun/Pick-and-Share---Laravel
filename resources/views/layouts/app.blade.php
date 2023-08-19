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