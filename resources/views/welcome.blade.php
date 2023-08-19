@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Book A Car
@endsection

{{-- Main Content --}}
@section('main')
@include('content.welcomMain')
@endsection