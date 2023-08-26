@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Book A Car
@endsection

{{-- Main Content --}}
@section('main')
{{-- msg --}}
@include('component.sesionMsg');
{{-- welcome content --}}
@include('content.welcomeMain')
@endsection