@extends('layouts.page')

{{-- Page Titile --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Body --}}
@section('main')
{{ $slot ?? '' }}
@endsection
