@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Main Content --}}
@section('main')

{{-- msg --}}
@include('component.sesionMsg')




@endsection
{{-- /Main Content --}}