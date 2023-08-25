@extends('layouts.page')

{{-- Page Title --}}
@section('pgTitle')
{{ config('app.name', 'Laravel') }} - Dashboard
@endsection



{{-- Main Content --}}
@section('main')

{{-- msg --}}
@include('component.sesionMsg')

{{-- <pre>
{{ $allDrivers }}
</pre> --}}


<div class="flex h-screen bg-gray-200">
    <!-- Side Menu -->
    <div class="bg-gray-800 text-white w-64 py-20 flex flex-col items-center">
        @include('admin.contentPart.rightNav')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-lg px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-8 md:mb-12">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Statistics of Site</h2><br><center><h3 class="font-bold text-red-400">{{ $allUsersCount-1 }}</h3><small>All Users - (Included Drivers)</center></small>
                </div>
                <!-- text - end -->

                <div class="grid grid-cols-2 gap-6 rounded-lg bg-indigo-500 p-6 md:grid-cols-4 md:gap-8 md:p-8">
                    <!-- stat - start -->
                    <div class="flex flex-col items-center">
                        <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $simpleUsersCount }}</div>
                        <div class="text-sm text-indigo-200 sm:text-base">Users / Non Driver</div>
                    </div>
                    <!-- stat - end -->

                    <!-- stat - start -->
                    <div class="flex flex-col items-center">
                        <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $allActiveDriversCount }}</div>
                        <div class="text-sm text-indigo-200 sm:text-base">All Active Drivers</div>
                    </div>


                    <!-- stat - start -->
                    <div title="Profile Created also requested for verify and account activation." class="flex flex-col items-center">
                        <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $allRequestedForActivationDriversCount }}</div>
                        <div class="text-sm text-indigo-200 sm:text-base">Requested for Activation</div>
                    </div>
                    <!-- stat - end -->

                    <!-- stat - start -->
                    <div title="Profile Created but Not Requested" class="flex flex-col items-center">
                        <div class="text-xl font-bold text-white sm:text-2xl md:text-3xl">{{ $allPendingDriversCount }}</div>
                        <div class="text-sm text- text-indigo-200 sm:text-base">Pending Drivers</div>
                    </div>
                    <!-- stat - end -->

                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
{{-- /Main Content --}}