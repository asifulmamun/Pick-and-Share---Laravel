@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Righ menu class for selected/highlighter --}}
@section('activeDriversMenuClass')
!bg-gray-700
@endsection


{{-- Main Content --}}
@section('main')

{{-- msg --}}
@include('component.sesionMsg')

<div class="flex h-screen bg-gray-200">
    <!-- Side Menu -->
    <div class="bg-gray-800 text-white w-64 py-20 flex flex-col items-center">
        @include('admin.contentPart.rightNav')
    </div>

    <!-- Content -->
    <div class="flex-1 p-8">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="max-w-5xl mx-auto py-6 sm:px-6 lg:px-8"> <!-- Tailwind CSS styles for container -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> <!-- Styling for the containing element -->
                    <div class="p-6 bg-white border-b border-gray-200"> <!-- Styling for the inner content -->
                        <h2 class="text-xl font-semibold mb-4">Active Drivers</h2>
                        <ul class="grid grid-cols-1 gap-4">
                            @foreach($activeDrivers as $activeDriver)
                            <li class="bg-white p-4 shadow rounded flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 mr-6">
                                        <a href="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($activeDriver->email))) }}?s=1024"
                                            target="_blank" class="group-hover:opacity-75 transition-opacity">
                                            <img class="w-full h-full"
                                                src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($activeDriver->email))) }}?s=200"
                                                alt="{{ $activeDriver->name }}" class="w-32 h-32 rounded-full">
                                        </a>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-red-400"><a href="{{ route('admin.driverProfile', ['id' => $activeDriver->user_id]) }}">{{ $activeDriver->name }}</a></div>
                                        <small class="text-gray-600">
                                            Driver ID: {{ $activeDriver->user_id }},
                                            Email: {{ $activeDriver->email }},
                                            Cell: {{ $activeDriver->phone_number }}
                                            <br>
                                            License: {{ $activeDriver->license_number }},
                                            <b class="text-red-400">License Valid: {{ $activeDriver->license_expire_date }}</b>,
                                            NID: {{ $activeDriver->nid }},
                                            DOB: {{ $activeDriver->date_of_birth }}
                                        </small>
                                    </div>
                                </div>
                                <div>
                                    {{-- <a href="{{ route('admin.driverProfileActivation', ['id' => $activeDriver->user_id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">ACTIVE</a> --}}
                                    <a href="{{ route('admin.driverProfileInActivation', ['id' => $activeDriver->user_id]) }}" class="inline-flex items-center px-4 py-2 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">IN ACTIVE</a>
                                    <a href="{{ route('admin.driverProfile', ['id' => $activeDriver->user_id]) }}" class="bg-blue-400 text-white px-4 py-2 rounded">Details</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- /Main Content --}}